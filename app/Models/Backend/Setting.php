<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'settings';
    protected $fillable = ['site_name','site_slogan','site_logo','site_favicon','address','email','phone','google_map_link','facebook_link','twitter_link','instagram_link','created_by','updated_by'];
    protected $filltable = ['site_name','site_slogan','site_logo','site_favicon','address','email','phone','google_map_link','facebook_link','twitter_link','instagram_link','created_by','updated_by'];

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
