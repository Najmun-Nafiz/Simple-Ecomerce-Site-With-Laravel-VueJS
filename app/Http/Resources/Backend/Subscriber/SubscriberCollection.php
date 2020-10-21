<?php

namespace App\Http\Resources\Backend\Subscriber;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubscriberCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($subscriber){
                return[
                    'id' => $subscriber->id,
                    'subscriber' => $subscriber->subscriber,
                    'status' => $subscriber->status,
                ];
            })
        ];
    }
}
