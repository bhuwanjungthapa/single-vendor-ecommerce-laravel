<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atttribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $fillable = ['title','status','created_by','updated_by'];
    protected $filltable = ['title','status','created_by','updated_by'];
}
