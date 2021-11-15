<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Posts\Category;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\Posts\Post;
use Carbon\Carbon;
use App\Traits\Methods;


class WebController extends Controller
{
     public function web(Request $request){

        if ($request->isMethod('get')) {
            // $visitors = Methods::visitors();
       
            
       

            return  view('web.index');
        }else{
            return response()->json([
                'info' => 'This method not is supported'
            ]);
        }
       
    }

    public function about(Request $request){

         if ($request->isMethod('get')) {
            $visitors = Methods::visitors();
            return  view('web.about');
        }else{
            return response()->json([
                'info' => 'This method not is supported'
            ]);
        }

       
    }

    public function landing(Request $request){
       
        if ($request->isMethod('get')) {
            $visitors = Methods::visitors();
            return  view('web.landing');
        }else{
            return response()->json([
                'info' => 'This method not is supported'
            ]);
        }
       
    }
}
