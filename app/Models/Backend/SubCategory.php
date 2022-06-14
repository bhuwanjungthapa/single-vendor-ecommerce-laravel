<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = ['category_id','title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];
    protected $filltable = ['category_id','title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];
}
