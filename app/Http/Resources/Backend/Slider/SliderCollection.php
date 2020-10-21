<?php

namespace App\Http\Resources\Backend\Slider;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($slider){
                return[
                    'id' => $slider->id,
                    'title' => $slider->title,
                    'description' => $slider->description,
                    'image' => $slider->image,
                    'status' => $slider->status,
                ];
            })
        ];
    }
}
