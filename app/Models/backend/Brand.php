<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'barnds';
    protected $fillable = ['title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];
    protected $filltable = ['title','status','slug','created_by','updated_by','rank','image','meta-title','meta-keyword','meta-description'];
}
