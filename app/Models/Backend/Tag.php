<?php

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tags';
    protected $fillable = ['title', 'status', 'slug', 'created_by', 'updated_by'];
    protected $filltable = ['title', 'status', 'slug', 'created_by', 'updated_by'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
    /*function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }*/
}
