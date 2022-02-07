<?php

namespace App\Http\Controllers\Api\Admin\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Exchange\Commission;
use App\Models\Admin\Exchange\Cryptocurrencie;
use App\Models\Users\BankAccount;
use Auth;


class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $token)
    {
        $user = Auth::user();

        if($request->isMethod('GET')){
            if ($user->token_login == $token) {
                
                $commission = Commission::orderBy('id', 'desc')->first();
                $cryptos = Cryptocurrencie::orderBy('name')->get();
                $banksAccounts = BankAccount::with('bank')
                                            ->orderBy('id', 'desc')
                                            ->where('user_id', $user->id)
                                            ->get();
                return response()->json([
                    'user' => $user,
                    'commission' => $commission,
                    'cryptos' => $cryptos,
                    'banksAccounts' => $banksAccounts,
                ]);

            } 
        }else{
            return 'Invalid Method!';
        }
        
    }
    public function apiCallExchange(){

        $cryptoQuery = '';
        return response()->json([
            'message' => 'Success get data',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
