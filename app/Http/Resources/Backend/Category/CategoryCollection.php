<?php

namespace App\Http\Resources\Backend\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($category){
                return[
                    'id' => $category->id,
                    'title' => $category->title,
                    'status' => $category->status,
                ];
            })
        ];
    }
}
