<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Users\NewsletterRequest;

use App\Models\Users\Newsletter;

class NewsletterController extends Controller
{
    
    public function newsletter(NewsletterRequest $request){
       
        if ($request->isMethod('post')) {
            
            $newsletter = new Newsletter;
            $newsletter->email = $request->email;
            $newsletter->save();

            return response()->json([
                'status' => 110,
                'message' => 'Joining To newsletter'
            ]);

        }else{
            return response()->json([
                'message' => 'Method no supported'
            ]);
        }
    }
}
