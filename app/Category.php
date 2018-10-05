<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    protected $perPage = 6;

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
