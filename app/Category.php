<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";
    protected $fillable = [
        'title',
        'description',
        'id_parent'
    ];

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
