<?php

namespace App\Http\Resources\Backend\SocialMedia;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialMediaResource extends JsonResource
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
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'instagram' => $this->instagram,
            'rss' => $this->rss,
            'pnterest' => $this->pnterest,
            'whatsapp' => $this->whatsapp,
            'status' => $this->status,
        ];
    }
}
