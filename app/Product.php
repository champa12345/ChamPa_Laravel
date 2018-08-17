<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

     public function billdetails()
    {
        return this->hasMany('App\BillDetail');
    }

    public function category()
    {
        return this->belongTo('App\category');
    }
}