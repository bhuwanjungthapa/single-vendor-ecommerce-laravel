<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='products';
    protected $fillable = ['title','slug','status','specification','description','price','discount','stock','quantity','flash_key','hot_key','category_id','subcategory_id','meta_title','meta_keyword','meta_description','created_by','updated_by'];
    protected $filltable=['title','slug','status','specification','description','price','discount','stock','quantity','flash_key','hot_key','category_id','subcategory_id','meta_title','meta_keyword','meta_description','created_by','updated_by'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
    function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }
    function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id','id');
    }
}
