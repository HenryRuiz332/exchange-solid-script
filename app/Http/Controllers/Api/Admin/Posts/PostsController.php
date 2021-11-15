<?php

namespace App\Http\Controllers\Api\Admin\Posts;

use App\Traits\Files\HandlerFiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Posts\Post;
use App\Models\Admin\App\Category;
use App\Models\Admin\Posts\PostsTag;
use App\Models\Admin\App\Tag;

use App\Models\Admin\App\StatusModel;
use Illuminate\Support\Str;
use DB;
use Auth;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Http\Requests\Admin\Post\PostUpdatedRequest;
use Artisan;
use App\Models\Admin\App\ModelType;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->isMethod("get")){
            $posts = Post::with('user', 'category', 'tags.tag', 'meta')
                ->where('user_id', Auth::id())
                ->orderBy('id', 'desc')->get();

            $idsModel = [];
            $models = ModelType::get(['model', 'id']);
            foreach($models as $model){
                if($model['model'] == 'posts'){
                    $idsModel [] = $model['id'];
                }
                
            }

            $categories = null;
            foreach ($idsModel as $idModel) {
                $categories = Category::where('model_id', $idModel)->get(['id', 'model_id', 'name', 'parent']);
            }
            

            $tags = Tag::get(['id' ,'name']);

            $statuses = StatusModel::where('table_name', 'posts')->get();
            return response()->json([
                'status'  => 200,
                'message' => 'Post List',
                'posts'    => $posts,
                'categories'    => $categories,
                'tags'    => $tags,
                'statuses'  => $statuses,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function pathServer(){
        $PATH = $_SERVER['DOCUMENT_ROOT'];
        $pathPublicOut = explode('public',$PATH);
        $res = $pathPublicOut[0]; 
        return $res;
    }

    public function store(PostRequest $request)
    {
       
        $tagsPost = $request->tagsPost;
        $categoryName = Category::findOrFail($request['category_id'])->name;
        $feature = null;

        if ($request['feature'] == true) {
            $feature = 1;
        }else{
            $feature = 0;
        }
        if($request->isMethod('post')){
            try {
                $post = new Post();
                $post->category_id = $request['category_id'];
                $post->user_id = Auth::id();
                $post->name = $request['name'];
                $post->feature = $feature;
                $post->slug = Str::slug($request->name, '-');
                $post->url_post =  Str::slug($categoryName) . '/' . $post->slug;
                $post->description = $request['description'];
                $post->extract = $request['extract'];
                $post->status = $request['status']['name'];
                $post->saveOrFail();
                //make dir post
                $destination = $this->makeDir($post->user_id, $post->id);
                
                if (isset($tagsPost)) {
                   foreach($tagsPost as $tag){
                       // save news tags
                        strtolower($tag['name']);
                        DB::table('tags')->updateOrInsert(
                            array('name'         => $tag['name'], 'slug' => Str::slug($tag['name'], '-')
                                  
                        ));

                        //save post tags
                        $postTag = new PostsTag();
                        $postTag->post_id = $post->id;
                        $postTag->tag_id =  $tag['id'];
                        $postTag->save();
                    }    
                }
                


                $this->saveImage($request,$post->id, $destination);
              
                //send mil to subscriptors

                // Mail::to($email)->queue(new NewUserMail($user, $password));
              
                return response()->json([
                    'status'  => 200,
                    'message'   => 'Post Save!',
                    'post'    => $post
                ]);
            } catch (\Throwable $th) {
                // $deletDir = $this->pathServer() .'storage/app/public/posts/post_'. $post->id . '/';

                // rmdir($deletDir);
                $post->forceDelete();
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
    public function update(PostUpdatedRequest $request, $id)
    {
        
        $tagsPost = $request->tagsPost;
        $categoryName = Category::findOrFail($request['category_id'])->name;
        if ($request['feature'] == true) {
            $feature = 1;
        }else{
            $feature = 0;
        }
        if($request->isMethod('post')){
           
                $post =  Post::findOrFail($id);
                $post->category_id = $request['category_id'];
                $post->user_id = Auth::id();
                $post->name = $request['name'];
                $post->feature = $request['feature'];
                $post->slug = Str::slug($request->name, '-');
                $post->url_post =  Str::slug($categoryName) . '/' . $post->slug;
                $post->description = $request['description'];
                $post->extract = $request['extract'];
                $post->status = $request['status']['name'];
                $post->update();

                
                foreach($tagsPost as $tag){
                    //save news tags
                    strtolower($tag['name']);
                    DB::table('tags')->updateOrInsert(
                        array('name'         => $tag['name'], 'slug' => Str::slug($tag['name'], '-')
                              
                    ));

                    //save post tags
                    DB::table('posts_tags')->updateOrInsert(
                        array('post_id'         => $post->id, 'tag_id' => $tag['id']
                              
                    ));
                }
                
                return response()->json([
                    'status'  => 200,
                    'message'   => 'Post Update!',
                    'post'    => $post
                ]);
           
        }
    }

     protected function makeDir($postsDirUser, $postsDir){
        $postsDirUser = $this->pathServer() . 'storage/app/public/posts/U_'. Auth::id() . '/';
        $this->ValidatorFolder($postsDirUser);

        $postsDir = $this->pathServer() . 'storage/app/public/posts/U_' . Auth::id() . '/post_'. $postsDir . '/';
        $this->ValidatorFolder($postsDir);

        return $postsDir;
    }

    protected function ValidatorFolder($dir){
        if(!is_dir($dir)){
            mkdir($dir, 0775, true);
        }else{
           ;
        }
    }

    public function updateImage(Request $request){
        $this->saveImage($request,$request->post_id);

        $post = Post::findOrFail($request->post_id);
        return response()->json([
            'post' => $post
        ]);
    }

    protected function saveImage($request,$postId, $destination){
        
        $NameFile = HandlerFiles::store($request, $destination);
        if (count($NameFile->original['nameFiles']) > 0 ) {
                $postImage = Post::findOrFail($postId);
                $postImage->image_main = $NameFile->original['nameFiles'][0];
                $postImage->update();
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


    public function trashAll(Request $request)
    {
        
        if ($request->isMethod("post")) {

            foreach ($request->deletes as $post) {
                
                $post = Post::findOrFail($post['id'])->forceDelete();
            }

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }
}
