<?php

namespace App\Http\Controllers\Api\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Users\BanksAccountsCreatedRequest;
use App\Http\Requests\Frontend\Users\BanksAccountsUpdateRequest;
use App\Http\Requests\Frontend\Users\BanksAccountsMovilCreatedRequest;
use App\Http\Requests\Frontend\Users\BanksAccountsMovilUpdateRequest;
use App\Traits\GlobalTraits\Paginate;
use App\Models\Users\BankAccount;
use App\Models\Admin\App\Bank;
use DB;
use Illuminate\Support\Str;
use Auth;

class BanksAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $token)
    {
        $banksAccounts = null;
        if ($request->isMethod("GET")) {
             if (Auth::user()->token_login == $token) {
               
                $banksAccounts = BankAccount::with('bank')
                                            ->orderBy('id', 'desc')
                                            ->where('user_id', Auth::id())
                                            ->paginate(2);
                
                // $trash = $this->getTrash($request);
                $banks = Bank::orderBy('bank_name', 'desc')->get(['id', 'bank_name', 'code']);

                return response()->json([
                    'status' => 200,
                    'message' => 'Data Succesfull',
                    'banksAccounts' => $banksAccounts,
                    'banks' => $banks,
                ]);
            }else{
                 return response()->json([
                    'message' => 'Invalid Token!'
                ]); 
            } 
            
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
    public function store(BanksAccountsCreatedRequest $request, $token)
    {
        $bankAccount = null;

        if ($request->isMethod("POST")) {

             if (Auth::user()->token_login == $token) {
               
                try {
                    $bankAccount = new BankAccount;
                    
                    $bankAccount->user_id = Auth::id();
                    $bankAccount->bank_id = $request->bank_id;
                    $bankAccount->name_user_account = $request->name_user_account;
                    $bankAccount->account_number = $request->account_number;
                    $bankAccount->document = $request->document;
                    $bankAccount->type = $request->type;
                    $bankAccount->saveOrFail();

                    //send email cracion de cuenta bancaria

                    return response()->json([
                        'status' => 200,
                        'message' => 'Data Saved',
                        'bankAccount' => $bankAccount,
                        
                    ]);
                } catch (Exception $e) {
                    $bankAccount->forceDelete();
                    return $e;
                }
            }else{
                 return response()->json([
                    'message' => 'Invalid Token!'
                ]); 
            } 
            
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Request Error'
            ]);  
        }
    }
     public function storeM(BanksAccountsMovilCreatedRequest $request, $token)
    {
        $bankAccount = null;

        if ($request->isMethod("POST")) {

             if (Auth::user()->token_login == $token) {
               
                try {
                    $bankAccount = new BankAccount;
                    
                    $bankAccount->user_id = Auth::id();
                    $bankAccount->bank_id = $request->bank_id;
                    $bankAccount->document = $request->document;
                    $bankAccount->type = $request->type;
                    $bankAccount->phone = $request->phone;
                    $bankAccount->saveOrFail();

                    return response()->json([
                        'status' => 200,
                        'message' => 'Data Saved',
                        'bankAccount' => $bankAccount,
                        
                    ]);
                } catch (Exception $e) {
                    $bankAccount->forceDelete();
                    return $e;
                }
            }else{
                 return response()->json([
                    'message' => 'Invalid Token!'
                ]); 
            } 
            
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Request Error'
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
    public function update(BanksAccountsUpdateRequest $request, $id, $token)
    {

        return $request;
        $bankAccount = null;
        if ($request->isMethod("POST")) {
             if (Auth::user()->token_login == $token) {

                $bankAccount =  BankAccount::findOrFail($id);
                $bankAccount->bank_id = $request->bank_id;
                $bankAccount->name_user_account = $request->name_user_account;
                $bankAccount->account_number = $request->account_number;
                $bankAccount->document = $request->document;
                $bankAccount->type = $request->type;
                $bankAccount->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Data Update',
                    'bankAccount' => $bankAccount,
                    
                ]);
               
            }else{
                 return response()->json([
                    'message' => 'Invalid Token!'
                ]); 
            } 
            
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Request Error'
            ]);  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->isMethod("delete")) {
            $bankAccount = BankAccount::findOrFail($id)->forceDelete();

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }

    public function trashAll(Request $request, $token)
    {
        
        
    }
}
