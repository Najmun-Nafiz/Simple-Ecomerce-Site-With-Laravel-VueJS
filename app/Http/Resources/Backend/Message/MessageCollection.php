<?php

namespace App\Http\Resources\Backend\Message;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($message){
                return[
                    'id' => $message->id,
                    'title' => $message->title,
                    'email' => $message->email,
                    'phone' => $message->phone,
                    'subject' => $message->subject,
                    'message' => $message->message,
                    'status' => $message->status,
                ];
            })
        ];
    }
}
