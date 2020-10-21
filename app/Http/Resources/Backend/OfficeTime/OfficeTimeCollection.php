<?php

namespace App\Http\Resources\Backend\OfficeTime;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OfficeTimeCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($officeTime){
                return[
                    'id' => $officeTime->id,
                    'title' => $officeTime->title,
                    'daily_rutine' => $officeTime->daily_rutine,
                    'optional_day' => $officeTime->optional_day,
                    'off_day' => $officeTime->off_day,
                    'status' => $officeTime->status,
                ];
            })
        ];
    }
}
