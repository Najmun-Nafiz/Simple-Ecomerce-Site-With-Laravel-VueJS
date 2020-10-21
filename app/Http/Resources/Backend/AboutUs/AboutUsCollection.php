<?php

namespace App\Http\Resources\Backend\AboutUs;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AboutUsCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($aboutUs){
                return[
                    'id' => $aboutUs->id,
                    'title' => $aboutUs->title,
                    'description' => $aboutUs->description,
                    'image' => $aboutUs->image,
                    'back_image' => $aboutUs->back_image,
                    'status' => $aboutUs->status,
                ];
            })
        ];
    }
}
