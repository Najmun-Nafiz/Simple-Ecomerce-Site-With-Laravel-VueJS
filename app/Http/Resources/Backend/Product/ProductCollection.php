<?php

namespace App\Http\Resources\Backend\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($product){
                return[
                    'id' => $product->id,
                    'category_id' => $product->category_id,
                    'sub_category_id' => $product->sub_category_id,
                    'title' => $product->title,
                    'storage' => $product->storage,
                    'price' => $product->price,
                    'description' => $product->description,
                    'image1' => $product->image1,
                    'image2' => $product->image2,
                    'image3' => $product->image3,
                    'status' => $product->status,
                ];
            })
        ];
    }
}
