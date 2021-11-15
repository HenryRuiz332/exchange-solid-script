<?php

namespace App\Models\Admin\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Posts\Post;
use App\Models\Admin\App\Tag;

class PostsTag extends Model
{
    use HasFactory;


    public function post(){
        return $this->hasMany(Post::class, 'id', 'post_id');
    }
    public function tag(){
        return $this->hasOne(Tag::class, 'id', 'tag_id');
    }
}
