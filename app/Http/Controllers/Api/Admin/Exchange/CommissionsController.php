<?php

namespace App\Http\Controllers\Api\Admin\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\Admin\Exchange\CommissionsCreatedRequest;
use App\Http\Requests\Admin\Exchange\CommissionsUpdatedRequest;

use App\Models\Admin\Exchange\Commission;


class CommissionsController extends Controller
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
                $commissions = Commission::orderBy('id', 'desc')->get();

                return response()->json([
                    'status' => 200,
                    'message' => 'Get commissions successfully',
                    'commissions' => $commissions,
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
    public function store(CommissionsCreatedRequest $request, $token)
    {

        $commission = null;
        $commissionLatest = null;
        if (Auth::user()->token_login == $token) {
            if($request->isMethod('post')){
                try {
                    $count = count(Commission::get());
                    if($count > 0){
                        $commissionLatest = Commission::orderBy('id','desc')->first();
                        $commissionLatest->status = 0;
                        $commissionLatest->update();
                    }
                    

                    $commission = new Commission();
                    $commission->dolar = $request['dolar'];
                    $commission->percentage = $request['percentage'];
                    $commission->status = 1;
                    $commission->saveOrFail();
                    return response()->json([
                        'status'  => 200,
                        'message'   => 'Post Save!',
                        'commission'    => $commission
                    ]);
                } catch (\Throwable $th) {
                    $commissionLatest = Commission::orderBy('id','desc')->first();
                    $commissionLatest->status = 1;
                    $commissionLatest->update();

                    $commission->forceDelete();
                    DB::rollBack();;
                    throw $th;
                }
            }
        }else{
             return 'Invalid Token';
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

                foreach ($request->deletes as $commissions) {
                    
                    $commissions = Commission::findOrFail($commissions['id'])->forceDelete();
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
