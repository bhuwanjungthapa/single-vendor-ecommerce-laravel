<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'customers';
    protected $fillable = ['name','email','password','perm_address','temp_address','shipping_addresss','phone','image','remember_taken'];
    protected $filltable = ['name','email','password','perm_address','temp_address','shipping_addresss','phone','image','remember_taken'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
