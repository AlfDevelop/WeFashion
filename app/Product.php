<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    public $table = "products";
    protected $fillable = [
        'name',
        'description',
        'price',
        'reference',
        'category_id',
        'image',
        'status',
        'active'
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
