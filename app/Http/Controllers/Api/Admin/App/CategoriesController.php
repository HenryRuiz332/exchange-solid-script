<?php

namespace App\Http\Controllers\Api\Admin\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\App\Category;
use Illuminate\Support\Str;
use App\Traits\GlobalTraits\Paginate;
use App\Models\Admin\App\StatusModel;
use DB;
use Auth;
use App\Http\Requests\Admin\Post\CategoryCreateRequest;
use App\Http\Requests\Admin\Post\CategoryUpdateRequest;
use App\Models\Admin\App\ModelType;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if ($request->isMethod('get')) {
             $categories = Category::with('children')
            ->orderBy('name', 'asc')
            ->paginate(10);
            foreach($categories as $category){

                $category['parent'] = Category::where('id',$category['parent'])->first();
            }
            
            //send Status
            $status = StatusModel::where('boolean', '!=', NULL)//
                                    ->get(['id', 'boolean']);

            $models = ModelType::get(['id', 'model']);

            return response()->json([
                'status'  => 200,
                'message' => 'Categories List',
                'categories'    => $categories,
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
    public function store(CategoryCreateRequest $request)
    {
        
        if($request->isMethod('post')){
             try {
                $category = new Category();

                $category->name = $request['name'];
                $category->slug = Str::slug($request['name'], '-');
                $category->user_id = Auth::id();
                $category->description = $request['description'];
                if($request->parent){
                    $category->parent = $request['parent']['id'];
                }
                $category->status_model_id = $request['status_model_id'];
                $category->model_id = $request['model_id'];
                $category->saveOrFail();


                return response()->json([
                    'status'  => 200,
                    'message'   => 'Category Save!',
                    'category'    => $category
                ]);
            } catch (\Throwable $th) {

                $category->forceDelete();
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
            $category = Category::findOrfail($id);
            return response()->json([
                'status'  => 200,
                'message' => 'Category ' . $category->name,
                'category'    => $category
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
    public function update(CategoryUpdateRequest $request, $id)
    {
        if($request->isMethod('put')){
            $category =  Category::findOrfail($id);
            $category->name = $request['name'];
            $category->slug = Str::slug($request['name'], '-');
            $category->user_id = Auth::id();
            $category->description = $request['description'];
            if($request->parent){
                $category->parent = $request['parent']['id'];
            }
            $category->status_model_id = $request['status_model_id'];
            $category->model_id = $request['model_id'];
            $category->update();

            return response()->json([
                'status'  => 200,
                'message'   => 'Category Update!',
                'category'    => $category
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
        //     $category = Category::onlyTrashed()->get();

        //     return response()->json([
        //         'status'=> 200,
        //         'category' => $category,
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
            Category::onlyTrashed()->find($id)->restore();

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
            $category = Category::findOrFail($id)->delete();

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
            $category = Category::findOrFail($id)->forceDelete();

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

            foreach ($request->deletes as $category) {
                
                $category = Category::findOrFail($category['id'])->forceDelete();
            }

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }

}