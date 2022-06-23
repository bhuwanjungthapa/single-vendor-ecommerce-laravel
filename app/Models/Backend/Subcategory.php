<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'subcategories';
    protected $fillable = ['category_id','title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];
    protected $filltable = ['category_id','title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
