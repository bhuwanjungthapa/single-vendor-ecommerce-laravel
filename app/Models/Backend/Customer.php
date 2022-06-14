<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['name','email','password','perm_address','temp_address','shipping_addresss','phone','image','remember_taken'];
    protected $filltable = ['name','email','password','perm_address','temp_address','shipping_addresss','phone','image','remember_taken'];
}
