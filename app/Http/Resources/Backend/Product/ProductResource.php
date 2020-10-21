<?php

namespace App\Http\Resources\Backend\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
            'title' => $this->title,
            'storage' => $this->storage,
            'price' => $this->price,
            'description' => $this->description,
            'image1' => $this->image1,
            'image2' => $this->image2,
            'image3' => $this->image3,
            'status' => $this->status,
        ];
    }
}
