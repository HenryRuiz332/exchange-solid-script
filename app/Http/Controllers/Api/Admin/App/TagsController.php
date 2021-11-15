<?php

namespace App\Http\Controllers\Api\Admin\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\App\Tag;
use Illuminate\Support\Str;
use App\Traits\GlobalTraits\Paginate;
use App\Models\Admin\App\StatusModel;
use DB;
use Auth;
use App\Http\Requests\Admin\Post\TagsPostRequest;
use App\Http\Requests\Admin\Post\TagsPosUpdatetRequest;
use App\Models\Admin\App\ModelType;
 
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            $tags = Tag::
            orderBy('name', 'asc')
            ->paginate(10);
            
            //send Status
            $status = StatusModel::where('boolean', '!=', NULL)//
                                    ->get(['id', 'boolean']);
            $models = ModelType::get(['id', 'model']);
            return response()->json([
                'status'  => 202,
                'message' => 'Tags List',
                'tags'    => $tags,
                'status' => $status,
                'models' => $models
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsPostRequest $request)
    {

        if($request->isMethod('post')){
             try {
                $tag = new Tag();

                $tag->name = $request['name'];
                $tag->slug = Str::slug($request['slug'], '-');
                $tag->user_id = Auth::id();
                $tag->description = $request['description'];
                $tag->status_model_id = $request['status_model_id'];
                $tag->model_id = $request['model_id'];
                $tag->saveOrFail();


                return response()->json([
                    'status'  => 202,
                    'message'   => 'Tag Save!',
                    'tag'    => $tag
                ]);
            } catch (\Throwable $th) {

                $tag->forceDelete();
                DB::rollBack();;
                throw $th;
            }
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
        if ($request->isMethod('get')) {
            $tag = Tag::findOrfail($id);
            return response()->json([
                'status'  => 202,
                'message' => 'Tag ' . $tag->name,
                'tag'    => $tag
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsPosUpdatetRequest $request, $id)
    {
        if($request->isMethod('put')){
            $tag =  Tag::findOrfail($id);
            $tag->name = $request['name'];
            $tag->slug = Str::slug($request['slug'], '-');
            $tag->user_id = Auth::id();
            $tag->description = $request['description'];
           
            $tag->status_model_id = $request['status_model_id'];
            $tag->model_id = $request['model_id'];
            $tag->update();

            return response()->json([
                'status'  => 202,
                'message'   => 'Tag Update!',
                'tag'    => $tag
            ]);
        }
    }

    /**
     * Get trashed items.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTrash(Request $request)
    {
        // if ($request->isMethod("GET")) {
        //     $tag = Tag::onlyTrashed()->get();

        //     return response()->json([
        //         'status'=> 200,
        //         'tag' => $tag,
        //     ], 200);
        // }
        return "papelera en construccion";
    }

    /**
     * Restore item
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            Tag::onlyTrashed()->find($id)->restore();

            return response()->json([
                'status'=> 200,
                'title' => 'Item restore',
                'message' => 'Restored successfully',
            ], 200);
        }
    }
     /**
     * Send the specified resource to trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendTrash(Request $request, $id)
    {
        if ($request->isMethod("post")) {
            $tag = Tag::findOrFail($id)->delete();

            return response()->json([
                'status'=> 200,
                'title' => 'Item restore',
                'message' => 'Item send to trash successfully',
            ], 200);
        }
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->isMethod("delete")) {
            $tag = Tag::findOrFail($id)->forceDelete();

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }

     public function trashAll(Request $request)
    {
        
        if ($request->isMethod("post")) {

            foreach ($request->deletes as $tag) {
                
                $tag = Tag::findOrFail($tag['id'])->forceDelete();
            }

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }
}
