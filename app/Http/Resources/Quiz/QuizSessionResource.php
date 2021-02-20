<?php

namespace App\Http\Resources\Quiz;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizSessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'session' => $this->session,
            'class_schedule_id' => $this->class_schedule_id,
            'score' => (int)$this->scores,
            'user' => $this->user->first_name,
        ];
    }
}
