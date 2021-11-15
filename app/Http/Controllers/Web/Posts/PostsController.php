<?php

namespace App\Http\Controllers\Web\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\App\Category;
use App\Models\Admin\Posts\PostsTag;
use App\Models\Admin\App\Tag;
use App\Models\Admin\Posts\Post;
use Carbon\Carbon;
use App\Traits\Methods;

class PostsController extends Controller
{
    public function posts(Request $request){

        if ($request->isMethod('get')) {
            $visitors = Methods::visitors();
            $posts = Post::orderBy('id', 'desc')
                        ->with('user','category', 'tags.tag', 'meta')
                        ->where('status', 'PUBLISHED')
                        ->paginate(12);

      
        
            return  view('web.posts.posts', compact('posts'));
        }else{
            return response()->json([
                'info' => 'This method not is supported'
            ]);
        }

       
    }


    public function singlePost(Request $request, $categorySlug, $postSlug){
        
        if ($request->isMethod('get')) {
            $visitors = Methods::visitors();
            $category = Category::where('slug', $categorySlug)->first();

            $post = Post::with('user','category', 'tags.tag')
                            ->where('status', 'PUBLISHED')
                            ->where('slug', $postSlug)
                            ->first();
            $blocks = json_decode($post->description)->blocks;
         
           
            $postsRelted = Post::orderBy('id', 'desc')
                            ->with('user','category', 'tags.tag', 'meta')
                            ->where('status', 'PUBLISHED')
                            ->where('id', '!=', $post->id)
                            ->where('category_id', $category->id)
                            ->paginate(10);
            
            return  view('web.posts.single_post', compact('post', 'postsRelted', 'blocks'));
        }else{
            return response()->json([
                'info' => 'This method not is supported'
            ]);
        }


       
    }


    public function postsForCategory(Request $request, $categorySlug){

        if ($request->isMethod('get')) {
            $visitors = Methods::visitors();
            $category = Category::where('slug', $categorySlug)->first();

            $posts = Post::with('user','category', 'tags.tag', 'meta')
                            ->orderBy('id', 'desc')
                            ->where('status', 'PUBLISHED')
                            ->where('category_id', $category->id)
                           ->paginate(10);
            
            return  view('web.posts.posts_category', compact('posts', 'category'));
        }else{
            return response()->json([
                'info' => 'This method not is supported'
            ]);
        }

       
    }
}


