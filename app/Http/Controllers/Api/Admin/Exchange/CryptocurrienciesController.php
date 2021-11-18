<?php

namespace App\Http\Controllers\Api\Admin\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\Admin\Exchange\CommissionsCreatedRequest;
use App\Http\Requests\Admin\Exchange\CommissionsUpdatedRequest;

use App\Models\Admin\Exchange\Cryptocurrencie;

class CryptocurrienciesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $token)
    {
       
        if (Auth::user()->token_login == $token) {
            if ($request->isMethod('GET')) {
                $crypto = Cryptocurrencie::orderBy('id', 'desc')->get();

                return response()->json([
                    'status' => 200,
                    'message' => 'Get crypto successfully',
                    'crypto' => $crypto,
                ]);
            }else{
                 return 'Invalid Request';
            }
        }else{
            return 'Invalid Token';
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $token)
    {

        $crypto = null;
        $status = null;
        if ($request['status'] == true) {
            $status = 1;
        }else{
            $status = 0;
        }
        if (Auth::user()->token_login == $token) {
            if($request->isMethod('post')){
                try {
                   
                    $crypto = new Cryptocurrencie();
                    $crypto->svg = $request['svg'];
                    $crypto->crypto = $request['crypto'];
                    $crypto->status = $status;
                    $crypto->saveOrFail();

                    return response()->json([
                        'status'  => 200,
                        'message'   => 'Cryptocurrenci Save!',
                        'commission'    => $crypto
                    ]);
                } catch (\Throwable $th) {
                   
                    $crypto->forceDelete();
                    DB::rollBack();;
                    throw $th;
                }
            }else{
                 return 'Invalid Request!';
            }
        }else{
             return 'Invalid Token!';
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
    public function update(Request $request, $id)
    {
        //
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
    public function trashAll(Request $request, $token)
    {
        if (Auth::user()->token_login == $token) {
            if ($request->isMethod("post")) {

                foreach ($request->deletes as $crypto) {
                    
                    $crypto = Cryptocurrencie::findOrFail($crypto['id'])->forceDelete();
                }

                return response()->json([
                    'status'=> 200,
                    'title' => 'Item Destroyed :o',
                    'message' => 'Item Destroyed to data base',
                ], 200);
            }
        }
    }

}
