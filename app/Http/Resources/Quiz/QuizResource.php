<?php

namespace App\Http\Resources\Quiz;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Quiz\MultipleChoiceResource;

class QuizResource extends JsonResource
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
            'question' => $this->question,
            'session' => $this->session,
            'correctAnswer' => new MultipleChoiceResource($this->correctAnswer),
            'options' => MultipleChoiceResource::collection($this->multipleChoices)
        ];
    }
}
