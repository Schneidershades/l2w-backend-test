<?php

namespace App\Services;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizSession;

class QuizService
{
    public function register($request)
    {
    	$quiz = Quiz::where('class_schedule_id', $request['class_schedule_id'])->get();

		$quizNumber = Quiz::where('class_schedule_id', $request['class_schedule_id'])->pluck('id');

    	$quizRequest = array();

    	$result = [];

    	foreach ($quiz as $q) {

    		$rate = [
    			'id' => $q['id'],
    			'attempts' => $q['attempts'],
    		];

    		$quizRequest[] = $rate;

    	}

		$answeredQuestions = QuizAnswer::whereIn('quiz_id', $quizNumber)
								->where('correct', '<' , 5)
								->get();

		$quizAnswerRequest = $answeredQuestions->keyBy('quiz_id')->map(function($item){
			return $item->attempts;
		});

		$join = collect($quizRequest)->map(function($item) use ($quizAnswerRequest){
			if($quizAnswerRequest->keys()->contains($item['id'])){
				$item['attempts'] = $item['attempts'] + $quizAnswerRequest->get($item['id']);
			}
			return $item;
		});


    	foreach ($join as $r) {
    		$result[] = $this->fillArray($r['id'], $r['attempts']);
		}

		$ns = array_reduce($result, 'array_merge', array());

		$recheckQst = QuizAnswer::whereIn('quiz_id', $ns)
								->where('correct', '>=' , 5)
								->get();

		if($recheckQst->count() == $quiz->count()){
			$aboveFiveCorrectAnswers = QuizAnswer::whereIn('quiz_id', $quizNumber)
								->where('correct', '>=' , 5)
								->get();
			$correct = $aboveFiveCorrectAnswers->sum('correct');
			$failed = $aboveFiveCorrectAnswers->sum('fail');
			$total = $correct +  $failed;
			if($correct != 0 ||$total != 0){
				$percentage = $correct/$total * 100;

				$findLastSession = QuizSession::where('id', $request['quiz_session_id'])->first();
				$findLastSession->scores = $percentage;
				$findLastSession->save();
			}
			
			return null;
		}

		$random = $ns[mt_rand(0, count($ns) - 1)];

		$quiz = Quiz::where('id', $random)->first();

		return $quiz;
    }

    private function fillArray($value, $len) {
	  	$arr = [];
	  	for ($i = 0; $i < $len; $i++) {
	    	$arr[] = $value;
	  	}
	  	return $arr;
	}
}
