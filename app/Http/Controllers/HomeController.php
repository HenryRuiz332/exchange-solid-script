<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
       // $this->middleware('role:Admin');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($token=null)
    {


        // $token = 'xxxxx';
        // $appName = env('APP_NAME');

        return view('layouts.dashboard');
    }
    public function panel($token=null)
    {

        
        // $token = 'xxxxx';
        // $appName = env('APP_NAME');

        return 'panel';
    }
}
