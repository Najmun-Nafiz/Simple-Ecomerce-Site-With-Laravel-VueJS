<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categoryProduct()
    {
    	return $this->hasMany('App\Admin\CategoryProduct');
    }

    public function sub_category()
    {
    	return $this->hasMany('App\Admin\SubCategory');
    }

    public function product()
    {
        return $this->hasMany('App\Admin\Product');
    }
}
