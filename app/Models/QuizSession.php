<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Quiz\QuizSessionResource;
use App\Http\Resources\Quiz\QuizSessionCollection;
use App\Models\User;

class QuizSession extends Model
{
    use HasFactory;

    public $oneItem = QuizSessionResource::class;
    public $allItems = QuizSessionCollection::class;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
