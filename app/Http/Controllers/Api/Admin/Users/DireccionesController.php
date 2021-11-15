<?php

namespace App\Http\Controllers\Api\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DireccionCliente;
use App\Models\User;
use App\Http\Requests\DireccionCreate;
use App\Http\Requests\DireccionUpdate;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $direcciones = null;
        if ($request->isMethod("GET")) {
            $direcciones =  DireccionCliente::paginate(10);
            $countdirecciones = count(DireccionCliente::get(['id']));

            $clientes = User::get(['id', 'nombre']);
            return response()->json([
                'status' => 200,
                'message' => 'Data Succesfull',
                'direcciones' => $direcciones,
                'countVisitors' => $countdirecciones,
                'clientes' => $clientes
                
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Get Request Error'
            ]);  
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DireccionCreate $request)
    {
       

         $direccion = null;
        if ($request->isMethod("POST")) {
            try {
                $direccion = new DireccionCliente;
                

                $direccion->calle = strtoupper($request->calle);
                $direccion->num_ext = $request->num_ext;
                $direccion->num_int = $request->num_int;
                $direccion->colonia = $request->colonia;
                $direccion->estado = $request->estado;
                $direccion->pais = $request->pais;
                $direccion->cliente_id = $request->cliente_id;
                $direccion->saveOrfail();

                
                return response()->json([
                    'status' => 200,
                    'message' => 'Save Succesfull',
                    'direccion' => $direccion
                ]);
            } catch (\Throwable $th) {

                $direccion->forceDelete();
                DB::rollBack();
                throw $th;
            }

            

        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Post Request Error'
            ]);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DireccionUpdate $request, $id)
    {
        //Update users admin, author 
        $direccion = null;
        if ($request->isMethod("PUT")) {
          
                $direccion = DireccionCliente::findOrFail($id);
               
                $direccion->calle = strtoupper($request->calle);
                $direccion->num_ext = $request->num_ext;
                $direccion->num_int = $request->num_int;
                $direccion->colonia = $request->colonia;
                $direccion->estado = $request->estado;
                $direccion->pais = $request->pais;
                $direccion->cliente_id = $request->cliente_id;
                $direccion->update();
                
                
                
                return response()->json([
                    'status' => 200,
                    'message' => 'Save Succesfull',
                    'direccion' => $direccion
                ]);
            

        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Post Request Error'
            ]);  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function trashAll(Request $request)
    {
        
        if ($request->isMethod("post")) {

            foreach ($request->deletes as $visitor) {
                
                $visitor = DireccionCliente::findOrFail($visitor['id'])->forceDelete();
            }

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }
}
