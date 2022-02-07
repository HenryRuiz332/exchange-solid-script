<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/tests', [App\Http\Controllers\TestController::class, 'index']);


Route::get('/', [App\Http\Controllers\Web\WebController::class, 'web'])->name('web');



Auth::routes();

Route::group([], function() {
   Route::get('/dashboard/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*')->fallback()->name('dashboard.index');
});

Route::group([], function() {
   Route::get('/my-account/{any}', [App\Http\Controllers\Web\Customer\CustomerController::class, 'index'])->where('any', '.*')->fallback()->name('customer.index')->middleware('auth:sanctum');
});


Route::get('/cc', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   Artisan::call('route:cache');
   Artisan::call('storage:link');
   echo '<script>alert("cache clear Success gt")</script>';

});
