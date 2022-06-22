<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'brands';
    protected $fillable = ['title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];
    protected $filltable = ['title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
