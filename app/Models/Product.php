<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'intro',
        'category_id',
    ];

    // one to one

    // public function category(){
    //     return $this->belongsTo(Category::class,'category_id','id');
    // }

    // public function category(){
    //     return $this->hasOne(Category::class,'id','category_id');
    // }


    // many to many
    public function categories(){
        return $this->belongsToMany(Category::class,ProductCategory::class,'product_id','category_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'product_id','id');
    }

}
