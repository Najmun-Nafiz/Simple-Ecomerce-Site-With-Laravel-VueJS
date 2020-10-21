<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Admin\Category', 'category_id');
    }

    public function sub_category()
    {
    	return $this->belongsTo('App\Admin\SubCategory', 'sub_category_id');
    }
}
