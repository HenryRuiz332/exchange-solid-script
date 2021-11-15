<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

                    Route::resource('/direcciones', 'DireccionesController');
                    Route::post('/direcciones-delete', 'DireccionesController@trashAll');
                });

                //CategoriesController, TagsController
              
               
            });
            
           
    });
});