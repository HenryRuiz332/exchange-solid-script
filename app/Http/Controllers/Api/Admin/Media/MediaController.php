<?php

namespace App\Http\Controllers\Api\Admin\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Traits\Files\HandlerFiles;
use App\Traits\Files\ScanFolder;
use Artisan;


class MediaController extends Controller
{

     /**
     * pathServer(): return root project
     *
     * routes():  return routes assets
     */ 
    protected function pathServer(){
        $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
        $pathPublicOut = explode('public',$DOCUMENT_ROOT);
        $path = $pathPublicOut[0]; 
        return $path;
    }


    protected function routes($userId){
        $all = Storage::allDirectories('/public/media/user_' . $userId);
        $newAll = [];
        foreach($all as $route){
           $newAll[] =  'storage/app/' .$route;
        }
        return  $newAll;
    }

    public function arrayFormats(){
        $formats = ["pdf", "PDF","png","PNG","html","HTML", "webp","WEBP","jpg", "JPG","jpeg","JPEG", "xlsx","XLSX", "xls","XLS", "svg","SVG", "docx", "DOXC","doc","DOC","ppt","PPT","pptx","PPTX","txt","TXT", "gif","GIF","csv","CSV","zip","ZIP","gz","GZ","rar","RAR","tar","TAR","xml","XML","xmls","XMLS", "mp3", "mp4", "json", "epub", "EPUB", "ibook", "IBOOK", "awz",
            ];
        return $formats;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->isMethod('GET')){
            $path = $this->pathServer();
            $allScan = [];
            $arrayroutes = $this->routes(Auth::id());
            foreach($arrayroutes as $route){  
                $search = $route;
                if(is_dir($path.$route)){
                    $allScan [] = ScanFolder::obtenerArchivosDirectorios($this->arrayFormats(),$search, Auth::id());
                }
            }
           
            return response()->json([
                'status' => 200,
                'allScan' => $allScan,
                'user' => Auth::user(),
                'formats' => $this->arrayFormats()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->isMethod('POST')){
            $path = $request->path;
        
            $NameFile = HandlerFiles::store($request, $path . '/');
            
            return response()->json([
                'status' => 200,
                'message' => 'Upload Image(s)',
            ]);
        }
        
    }

    protected function saveFolder(Request $request){
        

        // $pathRequest = $request->path; //change next version
        $pathRequest = $this->pathServer() . '/storage/app/public/media/user_'. Auth::id() . '/';
        $folderName = $request->newFolder;

        
        $replaceSpecials = preg_replace('([^A-Za-z0-9 ])', ' ',  $folderName); //Reemplaza caracteres especiales por espacios
        $replaceSpecials = str_replace(" ", "" ,$replaceSpecials);//reemplaza espacios por pisos
        $folderName = $replaceSpecials;
        if(!is_dir($pathRequest. '/'. $folderName)){
            mkdir($pathRequest. '/'. $folderName, 0777);
        }else{
            return "folder existe";
        }
        return response()->json([
            'status' => 200,
            'message' => 'Folder created succesfully',
            'newFolder' => $folderName,
        ]);       
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

    public function deleteDocument(Request $request){

        if($request->isMethod('POST')){
            $tree = json_decode($request->tree);
       
            for ($i=0; $i < count($tree) ; $i++) { 
               
                if($tree[$i]->isFolder == "true"){
                    // $this->deleteGlobalFolder($PATH, $tree[$i]->path, $user_id);
                }else{
                    unlink($tree[$i]->path.'/'.$tree[$i]->name);
                } 
            }

            return response()->json([
                'status' => 200,
                'message' => 'Delete!',
            ]);
        }else{
            return response()->json([
                'status' => 900,
                'message' => 'This methods is not support',
            ]);
        }
    }
}
