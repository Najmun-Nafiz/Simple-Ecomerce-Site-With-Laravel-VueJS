<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function product()
    {
    	return $this->hasMany('App\Admin\Product');
    }

    public function category()
    {
    	return $this->belongsTo('App\Admin\Category', 'category_id');
    }
}
