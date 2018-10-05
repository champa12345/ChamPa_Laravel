<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $perPage = 8;
    
    public function billDetails()
    {
        return $this->hasMany('App\BillDetail');
    }

    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
