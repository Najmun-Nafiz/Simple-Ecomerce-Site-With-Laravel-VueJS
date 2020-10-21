<?php

namespace App\Http\Resources\Backend\Blog;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($blog){
                return[
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'description' => $blog->description,
                    'image' => $blog->image,
                    'status' => $blog->status,
                ];
            })
        ];
    }
}
