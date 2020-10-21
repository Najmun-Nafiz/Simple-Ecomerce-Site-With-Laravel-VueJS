<?php

namespace App\Http\Resources\Backend\ContactUs;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactUsCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($contactUs){
                return[
                    'id' => $contactUs->id,
                    'title' => $contactUs->title,
                    'description' => $contactUs->description,
                    'touch_description' => $contactUs->touch_description,
                    'address' => $contactUs->address,
                    'phone' => $contactUs->phone,
                    'email' => $contactUs->email,
                    'image' => $contactUs->image,
                    'status' => $contactUs->status,
                ];
            })
        ];
    }
}
