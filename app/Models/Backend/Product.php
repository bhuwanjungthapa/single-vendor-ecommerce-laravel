<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = ['title','slug','status','specification','description','price','discount','stock','quantity','flash_key','hot_key','category_id','sub_category_id','meta_title','meta_keyword','meta_description','created_by','updated_by'];
    protected $filltable=['title','slug','status','specification','description','price','discount','stock','quantity','flash_key','hot_key','category_id','sub_category_id','meta_title','meta_keyword','meta_description','created_by','updated_by'];
}
