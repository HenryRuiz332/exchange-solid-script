<?php

namespace App\Http\Controllers\Api\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Users\UserCreateRequest;
use App\Http\Requests\Admin\Users\UserUpdateRequest;
use App\Http\Resources\Admin\Users\UsersCollection;
use App\Http\Resources\Admin\Users\UserResource;
use App\Traits\GlobalTraits\Paginate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Admin\App\StatusModel;

use Spatie\Permission\Models\Permission;

use DB;
use Illuminate\Support\Str;
use Auth;
use App\Traits\Files\HandlerFiles;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Artisan;
use App\Rules\MatchOldPassword;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $users = null;
        if ($request->isMethod("GET")) {
            //Return number of pages from App\Traits\GlobalTraits\Paginate::itemPerPage()
            $pagesNumber =  Paginate::itemPerPage()->users;
            // $users =  UserResource::collection(User::orderBy('name', 'asc')->with('status', 'roles')->paginate($pagesNumber));
            $users = User::orderBy('name', 'asc')->with('status', 'roles')->paginate($pagesNumber);
            // $users = Paginate::createPaginator($request, $users->items(), $pagesNumber);

            $roles = Role::get(['id', 'name', 'guard_name']);
            $trash = $this->getTrash($request);
            $status = StatusModel::
                        where('boolean', '!=', NULL)//
                        ->get(['id', 'boolean']);
            
            return response()->json([
                'status' => 200,
                'message' => 'Data Succesfull',
                'users' => $users,
                'roles' => $roles,
                'status' => $status
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Get Request Error'
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
    public function store(UserCreateRequest $request)
    {
   
        //Create users admin, author 
        $user = null;
        if ($request->isMethod("POST")) {
            try {

                $user = new User;
                $user->country_id = $request->country_id;
                $user->state_id = $request->state_id;
                $user->city_id = $request->city_id;
                $user->user_id = Auth::id();
                $user->status_model_id = $request->status_model_id;
                $user->name = strtoupper($request->name);
                $user->username = strtoupper($request->username);
                $user->last_name = strtoupper($request->last_name);
                $user->document = $request->document;
                $user->email = $request->email;
                $user->phone = $request->phone;
                
                $password = Str::random(10);
                echo $password;
                $user->password  = Hash::make($password);
                $user->saveOrfail();

                //Recive roles and permission (array names)
                $user->syncRoles($request->roles);
                // $user->syncPermissions($request->permission_id);
                
                //Send Password via Email //SMS 
                $this->saveImage($request,$user->id);

                $this->principalFolder($user->id);

                
                return response()->json([
                    'status' => 200,
                    'message' => 'Save Succesfull',
                    'user' => $user
                ]);
            } catch (\Throwable $th) {

                $user->forceDelete();
                DB::rollBack();
                throw $th;
            }

            

        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Post Request Error'
            ]);  
        }
    }
    protected function saveImage($request,$userId){
        $userDir = $this->pathServer() . 'storage/app/public/users/user_'. $userId . '/';
        if(!is_dir($userDir)){
            mkdir($userDir, 0777);
        }else{
           ;
        }
        
        $NameFile = HandlerFiles::store($request, $this->pathServer() .'storage/app/public/users/user_'. $userId . '/');
        if (count($NameFile->original['nameFiles']) > 0 ) {
                $userImg = User::findOrFail($userId);
                $userImg->avatar = $NameFile->original['nameFiles'][0];
                $userImg->update();
        }
       
    }

    protected function principalFolder($userId){
        Storage::makeDirectory('public/media/user_'.$userId);
        Storage::makeDirectory('public/media/user_'.$userId . '/media');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $token)
    {
        $user = null; 
        if ($request->isMethod('GET')) {
            if (Auth::user()->token_login == $token) {
                $user = new UserResource(User::findOrFail($id));
                return response()->json([
                    'status' => 200,
                    'message' => 'Resource Successfull',
                    'user' => $user
                ]); 
            }else{
                 return response()->json([
                    'message' => 'Invalid Token!'
                ]); 
            } 
        }else{
             return response()->json([
                'status' => 400,
                'message' => 'Get Request Error'
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
    public function update(UserUpdateRequest $request, $id, $token)
    {
        //Update users admin, author 
        $user = null;
        if ($request->isMethod("POST")) {
            if (Auth::user()->token_login == $token) {
                $user = User::findOrFail($id);
                $user->country_id = $request->country_id;
                $user->state_id = $request->state_id;
                $user->city_id = $request->city_id;
                $user->user_id = Auth::id();
                $user->status_model_id = $request->status_model_id;
                $user->name = strtoupper($request->name);
                $user->username = strtoupper($request->username);
                $user->last_name = strtoupper($request->last_name);
                $user->document = $request->document;
                $user->email = $request->email;
                $user->phone = $request->phone;
                
                // $password = Str::random(10);
                // $user->password  = Hash::make($password);
                $user->update();

                $user->syncRoles($request->roles);
                $this->saveImage($request,$user->id);

                
                return response()->json([
                    'status' => 200,
                    'message' => 'Save Succesfull',
                    'user' => $user
                ]);
            
            }else{
                return response()->json([
                    'message' => 'Invalid Token!'
                ]);
            }
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Post Request Error'
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
        //     $user = User::onlyTrashed()->get();

        //     return response()->json([
        //         'status'=> 200,
        //         'data' => $user,
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
            User::onlyTrashed()->find($id)->restore();

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
            $user = User::findOrFail($id)->delete();

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
            $user = User::findOrFail($id)->forceDelete();

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

            foreach ($request->deletes as $user) {
                
                $user = User::findOrFail($user['id'])->forceDelete();
            }

            return response()->json([
                'status'=> 200,
                'title' => 'Item Destroyed :o',
                'message' => 'Item Destroyed to data base',
            ], 200);
        }
    }



    public function changePassword(Request $request, $token)
    {

        if (Auth::user()->token_login == $token) {
            $request->validate([
                'current_password' => ['required', new \App\Rules\MatchOldPassword],
                'password' => ['required'],
                'password_confirm' => ['same:password'],
            ]);

            $userAutId = Auth::id();
            $customer = User::findOrFail($userAutId);
            $customer->password = Hash::make($request['password']);
            $customer->update();

            //sendEmailChangePassword

            return response()->json([
                'message' => 'Has actualizado tu contraseña exitosamente'
            ]);
        }else{
            return response()->json([
                'message' => 'Invalid Token!'
            ]);
        }
     
       
    }

    
}

