<?php

namespace App\Models\Admin\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\App\ModelType;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $hideen = ['deleted_at'];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:00 A',
        'updated_at' => 'datetime:d/m/Y H:00 A',
        'deleted_at' => 'datetime:d/m/Y H:00 A',
    ];
    protected $guard= [];

    public function children() {
        return $this->hasMany( self::class, 'parent', 'id' )->with( 'children' );
    }

    public function model(){
        return $this->belongsTo(ModelType::class);
    }
}
