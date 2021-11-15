<?php

    /*
        *Author:  Henry Ruiz : henryruiz332@gmail.com
        *Requerimientos :  composer require "intervention/image"
        *version. 1.0
        
            
    */
    namespace App\Traits\Files;
    
    use Illuminate\Support\Str;
    use Illuminate\Http\Request;
   
	trait MakeDir {

        protected static function pathServer(){
            $PATH = $_SERVER['DOCUMENT_ROOT'];
            $pathPublicOut = explode('public',$PATH);
            $res = $pathPublicOut[0]; 
            return $res;
        }
        public static function makeDir(){
            
            $postsDir = MakeDir::pathServer() . 'storage/app/public/posts/';
            // $postsLarge = MakeDir::pathServer() . 'storage/app/public/posts/large/';
            // $postsMedium = MakeDir::pathServer() . 'storage/app/public/posts/medium/';
            // $postSmall = MakeDir::pathServer() . 'storage/app/public/posts/small/';

            $users = MakeDir::pathServer() . 'storage/app/public/users/';
            // $usersLarge = MakeDir::pathServer() . 'storage/app/public/users/large/';
            // $usersMedium = MakeDir::pathServer() . 'storage/app/public/users/medium/';
            // $usersmall = MakeDir::pathServer() . 'storage/app/public/users/small/';

            $media = MakeDir::pathServer() . 'storage/app/public/media/';

            $array = [$postsDir, $users, $postsLarge, $postsMedium,$postSmall,$usersLarge, $usersMedium, $usersmall,$media];

            foreach ($array as $key => $dir) {
                if(!is_dir($dir)){
                    mkdir($dir, 0755, true);
                }else{
                   ;
                }
            }
           
        }
        
    }