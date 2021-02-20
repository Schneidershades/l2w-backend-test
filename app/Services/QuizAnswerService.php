<?php

namespace App\Services;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizSession;
use App\Models\MultipleChoice;

class QuizAnswerService
{
    public function register($request)
    {
    	$choice = MultipleChoice::where('id', $request['multiple_choice_id'])->first();

        $selectedQuiz = Quiz::where('id', $request['quiz_id'])->first();

        $quizSession = QuizSession::where('id', $request['quiz_session_id'])->first();

    	$quiz = QuizAnswer::where('quiz_id', $request['quiz_id'])
                    ->where('quiz_session_id', $request['quiz_session_id'])
                    ->first();

    	if($quiz==null){
    		$quiz = new QuizAnswer;
    	}

        $quiz->quiz_id = $request['quiz_id'];
        $quiz->quiz_session_id = $request['quiz_session_id'];
        $quiz->session = $quizSession->session;
        $quiz->correct = $choice->correct == 1 ? $quiz->correct + 1 : $quiz->correct + 0;
        $quiz->fail = $choice->correct != 1 ? $quiz->fail + 1 : $quiz->fail + 0;
		$quiz->attempts = $choice->correct == 1 ? $selectedQuiz->attempts-1 : $selectedQuiz->attempts++;
		$quiz->save();
    }
}
