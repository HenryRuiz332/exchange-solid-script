<?php

namespace App\Http\Controllers\Api\Admin\Seo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Seo\SeoEngine;
use Auth;

class SeoEngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $robots = null;
        if ($request['metaRobots'] == true) {
            $robots = 1*1;
        }else{
            $robots = 0*0;
        }

        if ($request->isMethod('post')) {

            $postId = SeoEngine::where('post_id', $request['postId'])->first();
            if (!isset($postId)) {
                $meta = new SeoEngine;
                $meta->user_id = Auth::id();
                $meta->post_id = $request['postId'];

                $meta->title_page = $request['titlePage'];
                $meta->keywords = $request['keyword'];
                $meta->meta_description = $request['metaDescription'];
                $meta->meta_author = $request['metaAuthor'];
                $meta->meta_robots = $robots;
                $meta->saveOrFail();

                return response()->json([
                    'message' => 'Add Meta keywords succesfully',
                ]);
            }else{
                $meta = SeoEngine::findOrFail($postId->id);
                $meta->user_id = Auth::id();
                $meta->post_id = $request['postId'];
                
                $meta->title_page = $request['titlePage'];
                $meta->keywords = $request['keyword'];
                $meta->meta_description = $request['metaDescription'];
                $meta->meta_author = $request['metaAuthor'];
                $meta->meta_robots = $robots;
                $meta->update();

                return response()->json([

                    'message' => 'AUpdate  Meta keywords succesfully',
                ]);
            }
            
        }else{
            return "error";
        }
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
