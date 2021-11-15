<?php

namespace App\Http\Controllers\Api\Admin\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Marketplace\Product;
use Auth;
use DB;
use App\Models\Admin\App\Category;
use App\Models\Admin\App\ModelType;
use Illuminate\Support\Str;
use App\Models\Admin\App\StatusModel;
use App\Traits\Files\HandlerFiles;

class ProductsController extends Controller
{

    protected function user(){
        return Auth::user();
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $ApiToken)
    {
       
        if ($this->user()->token_login == $ApiToken) {
            if ($request->isMethod('GET')) {
                $products = Product::orderBy('id', 'desc')->paginate(9);

                $idsModel = [];
                $models = ModelType::get(['model', 'id']);
                foreach($models as $model){
                    if($model['model'] == 'products'){
                        $idsModel [] = $model['id'];
                    }
                    
                }

                $categories = null;
                foreach ($idsModel as $idModel) {
                    $categories = Category::where('model_id', $idModel)->get(['id', 'model_id', 'name', 'parent']);
                }
                

                $statuses = StatusModel::where('table_name', 'posts')->get();

                return response()->json([
                    'status' => 200,
                    'message' => 'Get products successfully',
                    'products' => $products,
                    'categories' => $categories,
                    'statuses' => $statuses
                ]);
            }
        }else{
            return 'Invalid Token';
        }
        
        
    }


   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ApiToken)
    {   
        $feature = null;

        if ($request['feature'] == true) {
            $feature = 1;
        }else{
            $feature = 0;
        }
         if ($this->user()->token_login == $ApiToken) {
             if($request->isMethod('post')){
                try {

                    $product = new Product();
                    $product->category_id = $request['category_id'];
                    $product->user_id = Auth::id();
                    $product->name = $request['name'];
                    $product->slug = Str::slug($request->name, '-');
                    $product->description = $request['description'];
                    $product->extract = $request['extract'];
                    $product->status = $request['status']['name'];
                    $product->feature = $feature;
                    $product->saveOrFail();
                    //make dir product
                    $destination = HandlerFiles::makeDir(Auth::id(), $product->id);
                    
                    $store = HandlerFiles::store($request, $destination, $product->id);
                    
                    return response()->json([
                        'status'  => 200,
                        'message'   => 'Post Save!',
                        'product'    => $product
                    ]);
                } catch (\Throwable $th) {
                    // $deletDir = $this->pathServer() .'storage/app/public/posts/post_'. $post->id . '/';

                    // rmdir($deletDir);
                    $product->forceDelete();
                    DB::rollBack();;
                    throw $th;
                }
            }
        }else{
            return 'Invalid Token';
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
        $feature = null;

        if ($request['feature'] == true) {
            $feature = 1;
        }else{
            $feature = 0;
        }
         if ($this->user()->token_login == $ApiToken) {
             if($request->isMethod('post')){
                $product =  Product::findOrfail($id);
                $product->category_id = $request['category_id'];
                $product->user_id = Auth::id();
                $product->name = $request['name'];
                $product->slug = Str::slug($request->name, '-');
                $product->description = $request['description'];
                $product->extract = $request['extract'];
                $product->status = $request['status']['name'];
                $product->feature = $feature;
                $product->update();
                //make dir product
                // $destination = $this->makeDir($product->user_id, $product->id);
                
                return response()->json([
                    'status'  => 200,
                    'message'   => 'Post Save!',
                    'product'    => $product
                ]);
               
            }
        }else{
            return 'Invalid Token';
        }
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
