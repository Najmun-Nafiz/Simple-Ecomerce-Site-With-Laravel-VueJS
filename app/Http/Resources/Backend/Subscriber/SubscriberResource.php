<?php

namespace App\Http\Resources\Backend\Subscriber;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriberResource extends JsonResource
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
            'subscriber' => $this->subscriber,
            'status' => $this->status,
        ];
    }
}
