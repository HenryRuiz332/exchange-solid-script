<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Files\MakeDir;
use Artisan;

class DashboardTecnocosmeticController extends Controller
{
    
    public function dashboard(){

        $appName = config('app.name');

        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
       
        

        return response()->json([

            'appName' => $appName,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
           
        ]);

    }


   
}
