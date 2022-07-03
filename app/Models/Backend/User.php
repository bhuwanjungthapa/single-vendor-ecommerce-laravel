<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'status','password', 'created_at', 'updated_at'];
    protected $filltable = ['name', 'email','status', 'password', 'created_at', 'updated_at'];

}
