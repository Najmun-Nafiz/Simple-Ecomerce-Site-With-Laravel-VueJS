<?php

namespace App\Http\Resources\Backend\ContactUs;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'touch_description' => $this->touch_description,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'image' => $this->image,
            'status' => $this->status,
        ];
    }
}
