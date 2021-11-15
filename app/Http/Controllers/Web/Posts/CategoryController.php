<?php

namespace App\Http\Controllers\Web\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\App\Category;
use App\Traits\Methods;

class CategoryController extends Controller
{
    public function categories(Request $request){
        if ($request->isMethod('get')) {
            $visitors = Methods::visitors();
            $categories = Category::orderBy('name')
                        ->paginate(12);

             return  view('web.posts.categories', compact('categories'));
        }else{
            return response()->json([
                'info' => 'This method not is supported'
            ]);
        }

        
    }
}
