<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Group No need Auth
Route::group(['prefix' => 'v1'], function(){



    Route::get('/index', [App\Http\Controllers\Api\AppController::class, 'main']);

});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
      return $user = User::with('roles')->where('id', $request->user()->id)->first();
});


Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::group(['prefix' => 'v1',], function(){
            Route::get('/dashboard', [App\Http\Controllers\Api\Admin\DashboardTecnocosmeticController::class, 'dashboard']);

            Route::get('/app', [App\Http\Controllers\Api\AppController::class, 'appDashboard']);

            Route::group([], function(){

            });

            
            Route::group(['namespace' => 'App\Http\Controllers\Api\Admin'], function(){
                Route::resource('/seo-engine', 'Seo\SeoEngineController');

                //UsersController
                Route::group(['namespace' => 'Users'], function(){

                    Route::resource('/users', 'UsersController');
                    Route::post('/users/{id}/{token}', 'UsersController@update');
                    Route::get('/users/{id}/{token}', 'UsersController@show');
                    Route::post('/users-delete', 'UsersController@trashAll');
                    Route::post('/users-trash/{id}', 'UsersController@sendTrash');
                    Route::post('/users-restore/{id}', 'UsersController@restore');
                    Route::post('/update-password/{token}', 'UsersController@changePassword');

                    Route::get('/banks-accounts/{token}', 'BanksAccountsController@index');
                    Route::post('/banks-accounts/{token}', 'BanksAccountsController@store');
                    Route::post('/banks-accounts-m/{token}', 'BanksAccountsController@storeM');
                    Route::put('/banks-accounts/{id}/{token}', 'BanksAccountsController@update');
                    Route::delete('/banks-accounts/{id}/{token}', 'BanksAccountsController@destroy');
                    Route::post('/banks-accounts-deletes/{id}/{token}', 'BanksAccountsController@trashAll');
                   
                });

                //
                //UsersController
                Route::group(['namespace' => 'Exchange'], function(){
                    Route::get('/exchange/commissions/{token}', 'CommissionsController@index');
                    Route::get('/exchange/commissions/{id}/{token}', 'CommissionsController@show');
                    Route::post('/exchange/commissions/{token}', 'CommissionsController@store');
                    Route::put('/exchange/commissions/{id}/{token}', 'CommissionsController@update');
                    Route::delete('exchange/commissions/{id}/{token}', 'CommissionsController@destroy');
                    Route::post('/exchange/commissions-deletes/{token}', 'CommissionsController@trashAll');
                    // Route::post('/exchange/comissions-trash/{id}', 'ComissionsController@sendTrash');
                    // Route::post('/exchange/comissions-restore/{id}', 'ComissionsController@restore');

                    Route::get('/exchange/{token}', 'CryptocurrienciesController@index');
                    Route::get('/exchange/cryptocurriencies/{id}/{token}', 'CryptocurrienciesController@show');
                    Route::post('/exchange/cryptocurriencies/{token}', 'CryptocurrienciesController@store');
                    Route::put('/exchange/cryptocurriencies/{id}/{token}', 'CryptocurrienciesController@update');
                    Route::delete('exchange/cryptocurriencies/{id}/{token}', 'CryptocurrienciesController@destroy');
                    Route::post('/exchange/cryptocurriencies-deletes/{token}', 'CryptocurrienciesController@trashAll');
                    // Route::post('/exchange/comissions-trash/{id}', 'ComissionsController@sendTrash');
                    // Route::post('/exchange/comissions-restore/{id}', 'ComissionsController@restore');


                    Route::get('/exchange/{token}', 'ExchangeController@index');
                    Route::get('/exchange/{id}/{token}', 'ExchangeController@show');
                    Route::post('/exchange/{token}', 'ExchangeController@store');
                    Route::put('/exchange/{id}/{token}', 'ExchangeController@update');
                    Route::delete('exchange/{id}/{token}', 'ExchangeController@destroy');
                    Route::post('/exchange/{token}', 'ExchangeController@trashAll');
                    // Route::post('/exchange/comissions-trash/{id}', 'ComissionsController@sendTrash');
                    // Route::post('/exchange/comissions-restore/{id}', 'ComissionsController@restore');
                   
                }); 
               
            });
            
           
    });
});