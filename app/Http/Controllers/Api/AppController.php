<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Admin\App\Country;
use App\Models\Admin\App\State;
use App\Models\Admin\App\City;
use App\Models\Users\Visitors;
use App\Models\User;
use App\Traits\Files\MakeDir;
use Artisan;
use Spatie\Sitemap\SitemapGenerator;
use Carbon\Carbon;

class AppController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware('role:Admin');
        
    }
    public function appDashboard(Request $request){
        if ($request->isMethod('get')) {
            $appName = config('app.name');

            $randomSession = Str::random(30);
            $value = session('sessionToken');
            $value = session('sessionToken', $randomSession);
            $session = $value;


            $countries = Country::get();
            $states = State::get();
            $cities = City::get();
            
            //section resune appa 
            $visitors = count(Visitors::get());
            $usersRegistered = count(User::get(['id']));


            $idUser = Auth::id();
            $user = User::where('id', $idUser)->with('roles')->first();

            return response()->json([
                'appName' => $appName,
                'session' => $session,
                'countries' => $countries,
                'states' => $states,
                'cities' => $cities,
                'pagesVisited' => $visitors,
                'user' => $user,
                'usersRegistered' => $usersRegistered
            ]);
        }
    }

    public function main(Request $request)
    {
        $session = null;

        if ($request->isMethod('GET')) {
            $strRandom = Str::random(30);

            $value = session('sessionToken');
            $value = session('sessionToken', $strRandom);
            $session = $value;


            
            $csrf_token = $session;

            return response()->json([
                'session' => $session,
                'csrf_token' => $csrf_token
                
            ]);
        }else{
            return response()->json([
                'message' => 'Ivalid Action',
                
            ]);
        }
        
    }
    public function validateRemoveItem(Request $request)
    {
        
        return Auth::user();
    }

    public function validateAuthUser(Request $request){
        $response = null;
        if (Auth::check()) {
            $response = true;
        }else{
            $response = false;
        }

        return response()->json([
            'user_logged' => $response
        ]);
    }


     protected function resources(){
       
        Artisan::call('storage:link');
        MakeDir::makeDir();
        return ;
    }
    public function sitemap(){
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
    }


    
}
