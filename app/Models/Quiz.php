<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassSchedule;
use App\Http\Resources\Quiz\QuizResource;
use App\Http\Resources\Quiz\QuizCollection;

class Quiz extends Model
{
    use HasFactory;

    public $oneItem = QuizResource::class;
    public $allItems = QuizCollection::class;

    public function classSchedule()
    {
    	return $this->hasMany(ClassSchedule::class);
    }

    public function multipleChoices()
    {
    	return $this->hasMany(MultipleChoice::class);
    }

    public function correctAnswer()
    {
        return $this->hasOne(MultipleChoice::class)->where('correct', true);
    }
}
