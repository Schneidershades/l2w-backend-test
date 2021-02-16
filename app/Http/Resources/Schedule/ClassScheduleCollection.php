<?php

namespace App\Http\Resources\Schedule;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassScheduleCollection extends ResourceCollection
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
            'data' => ClassScheduleResource::collection($this->collection),
        ];
    }
}
