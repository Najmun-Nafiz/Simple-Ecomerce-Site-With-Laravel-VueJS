<?php

namespace App\Http\Resources\Backend\SubCategory;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubCategoryCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($subCategory){
                return[
                    'id' => $subCategory->id,
                    'category_id' => $subCategory->category_id,
                    'title' => $subCategory->title,
                    'status' => $subCategory->status,
                ];
            })
        ];
    }
}
