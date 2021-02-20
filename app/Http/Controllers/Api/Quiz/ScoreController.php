<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizSession;

class ScoreController extends Controller
{
    public function show($id)
    {
    	$scores = QuizSession::where('class_schedule_id', $id)->get();
    	return $this->showAll($scores);
    }
}
