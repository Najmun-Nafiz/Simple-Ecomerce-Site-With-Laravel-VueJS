<?php

namespace App\Http\Resources\Backend\OfficeTime;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeTimeResource extends JsonResource
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
            'daily_rutine' => $this->daily_rutine,
            'optional_day' => $this->optional_day,
            'off_day' => $this->off_day,
            'status' => $this->status,
        ];
    }
}
