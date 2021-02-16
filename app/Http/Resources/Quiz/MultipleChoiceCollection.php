<?php

namespace App\Http\Resources\Quiz;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MultipleChoiceCollection extends ResourceCollection
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
            'data' => ultipleChoiceResource::collection($this->collection),
        ];
    }
}
