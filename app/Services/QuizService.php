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

		$answeredQuestions = QuizAnswer::whereIn('quiz_id', $quizNumber)->get();

		$quizAnswerRequest = $answeredQuestions->keyBy('quiz_id')->map(function($item){
			return $item->attempts;
		});

		$fish = collect($quizRequest)->map(function($item) use ($quizAnswerRequest){
			if($quizAnswerRequest->keys()->contains($item['id'])){
				$item['attempts'] = $item['attempts'] + $quizAnswerRequest->get($item['id']);
			}
			return $item;
		});


    	foreach ($fish as $r) {
    		$result[] = $this->fillArray($r['id'], $r['attempts']);
		}

        // $noDuplicates = array_unique($result);

        // $duplicates = array_diff($result, $noDuplicates);

		$ns = array_reduce($result, 'array_merge', array());

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
