<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Auth;
use Spatie\Sitemap\SitemapGenerator;
use Carbon\Carbon;
class TestController extends Controller
{
       public function index(){
        return 'dd';
             $server =  $_SERVER['SERVER_NAME'];
            $appServer = null;
            if($server == 'tecnocosmetic-api-prod.test'){
                $appServer = 'http://tecnocosmetic-api-prod.test';
            }else{
                $appServer = 'https://'. $server;
            }
            $sitemap = SitemapGenerator::create($appServer)->getSitemap()->writeToFile('sitemap.xml');
            return response()->json([
                'sitemap' => $sitemap
            ]);





            $s = SitemapGenerator::create('http://tecnocosmetic-api-prod.test/')->getSitemap()->writeToFile('sitemap.xml');
            dd($s);
           return;
            $permissions = Permission::orderBy('name', 'asc')->get(['id AS id', 'name AS name']);
            $rutasDB = DB::table('permissions')
           ->orderBy('name', 'asc')
           ->select('name')
           ->get();
           if (count($rutasDB)>0 ) {
               DB::select('DELETE FROM permissions');
           }else{


           #Foreach necesario para comparar arreglo.
           $RutasEnBD=Array();
             foreach($rutasDB as $route){
             $RutasEnBD[count($RutasEnBD)] = $route->name;
           }
           

           #Colección de Rutas.
           $routesApp = Route::getRoutes();
           //dd($routesApp);
           $RutasEnApp=Array();
           foreach($routesApp as $route){
             if($route->getName()!=null || $route->getName()!=''){
                   $RutasEnApp[count($RutasEnApp)] = $route->getName();
               }
           }

           #Eliminar ruta si anteriormente se guardó en BD pero ya no existe en la aplicación
           $deleteRoutes= array_diff($RutasEnBD, $RutasEnApp);
           foreach($deleteRoutes as $deleteroute ){
              DB::table('permissions')->where('name', $deleteroute)->delete();
           }

           #Comparación de arrays $RutasEnApp y $RutasEnBD. Esto solo mostrará las rutas que no están registradas en BD.
           $compararArray = array_diff($RutasEnApp, $RutasEnBD);
           $addRoutes = $compararArray;

            $Admin = 'Admin';

            $role = Role::where('name', $Admin)->first();

            foreach($addRoutes as $r){
                DB::table('permissions')->updateOrInsert(
                    ['name' => $r, 'guard_name' => 'web']
               );

               $role->givePermissionTo($r);
            }
             }

       }
}
