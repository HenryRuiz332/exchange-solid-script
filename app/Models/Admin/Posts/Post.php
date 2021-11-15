<?php

namespace App\Models\Admin\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\App\Category;
use App\Models\Admin\Posts\PostsTag;
use App\Models\Admin\Seo\SeoEngine;
use App\Models\User;

class Post extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->hasMany(PostsTag::class);
    }

    public function meta(){
        return $this->hasOne(SeoEngine::class);
    }

    
}
