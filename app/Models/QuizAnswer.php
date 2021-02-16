<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Http\Resources\Quiz\QuizAnswerResource;
use App\Http\Resources\Quiz\QuizAnswerCollection;

class QuizAnswer extends Model
{
    use HasFactory;

    public $oneItem = QuizAnswerResource::class;
    public $allItems = QuizAnswerCollection::class;

    public function quiz()
    {
    	return $this->hasMany(Quiz::class);
    }
}
