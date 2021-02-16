<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NanokaWeb\SpacedRepetition\SuperMemo\SM2;
use Illuminate\Support\Collection;
use App\Models\Quiz;
use App\Models\QuizAnswer;

class SM2Controller extends Controller
{
    public function index()
    {
    	// ($sm2 = new SM2());


		// $sm2->getNumberRepetitions(10);
		// $sm2->processRecallResult(4);

		// dd(
		// 	$sm2->getRepetitionInterval(), 
		// 	$sm2->getEasinessFactor(),
		// 	$sm2->getNumberRepetitions(), 
		// 	$sm2->getLastStudied(),
		// 	$sm2->getNextRepetition()
		// );


		// getRepetitionInterval()
 		// getNextRepetition()
  		// getEasinessFactor()
  		// getNumberRepetitions()
  		// getLastStudied()
    

		// 
		// setEasinessFactor($easinessFactor);
		// setNumberRepetitions($numberRepetitions);
		// setRepetitionInterval($repetitionInterval);
		// setNextRepetition($nextRepetition);
		// setLastStudied($lastStudied);
		// processRecallResult($qualityOfRecall);
		
		$quiz = Quiz::inRandomOrder()->get();
		$quizNumber = Quiz::pluck('id');

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

		$ns = array_reduce($result, 'array_merge', array());
		
		$random = $ns[mt_rand(0, count($ns) - 1)];

		$quiz = Quiz::where('id', $random)->get();

		return $this->showAll($quiz);
    }

    public function fillArray($value, $len) {
	  	$arr = [];
	  	for ($i = 0; $i < $len; $i++) {
	    	$arr[] = $value;
	  	}
	  	return $arr;
	}
}
