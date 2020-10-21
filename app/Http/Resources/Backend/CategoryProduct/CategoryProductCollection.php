<?php

namespace App\Http\Resources\Backend\CategoryProduct;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($categoryProduct){
                return[
                    'id' => $categoryProduct->id,
                    'category_id' => $categoryProduct->category_id,
                    'title' => $categoryProduct->title,
                    'image' => $categoryProduct->image,
                    'status' => $categoryProduct->status,
                ];
            })
        ];
    }
}
