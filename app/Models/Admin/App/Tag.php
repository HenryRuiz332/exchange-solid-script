<?php

namespace App\Models\Admin\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $hideen = ['deleted_at'];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:00 A',
        'updated_at' => 'datetime:d/m/Y H:00 A',
        'deleted_at' => 'datetime:d/m/Y H:00 A',
    ];
    protected $guard= [];

    
}
