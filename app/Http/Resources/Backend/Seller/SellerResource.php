<?php

namespace App\Http\Resources\Backend\Seller;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
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
            'profession' => $this->profession,
            'image' => $this->image,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'instagram' => $this->instagram,
            'status' => $this->status,
        ];
    }
}
