<?php

namespace App\Http\Resources\Backend\SocialMedia;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SocialMediaCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($socialMedia){
                return[
                    'id' => $socialMedia->id,
                    'facebook' => $socialMedia->facebook,
                    'twitter' => $socialMedia->twitter,
                    'linkedin' => $socialMedia->linkedin,
                    'instagram' => $socialMedia->instagram,
                    'rss' => $socialMedia->rss,
                    'pinterest' => $socialMedia->pinterest,
                    'whatsapp' => $socialMedia->whatsapp,
                    'status' => $socialMedia->status,
                ];
            })
        ];
    }
}
