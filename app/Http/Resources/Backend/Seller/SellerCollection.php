<?php

namespace App\Http\Resources\Backend\Seller;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SellerCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($seller){
                return[
                    'id' => $seller->id,
                    'title' => $seller->title,
                    'description' => $seller->description,
                    'profession' => $seller->profession,
                    'image' => $seller->image,
                    'facebook' => $seller->facebook,
                    'twitter' => $seller->twitter,
                    'linkedin' => $seller->linkedin,
                    'instagram' => $seller->instagram,
                    'status' => $seller->status,
                ];
            })
        ];
    }
}
