<?php

namespace App\Http\Resources\Backend\CategoryProduct;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductResource extends JsonResource
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
            'title' => $this->title,
            'image' => $this->title,
            'status' => $this->status,
        ];
    }
}
