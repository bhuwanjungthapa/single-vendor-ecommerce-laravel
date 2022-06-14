<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = ['title','status','slug','created_by','updated_by'];
    protected $filltable = ['title','status','slug','created_by','updated_by'];
}
