<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizSession;
use App\Http\Requests\Quiz\QuizCreateFormRequest;

class QuizController extends Controller
{
	/**
     * @OA\Post(
     *      path="/api/v1/quiz/question",
     *      operationId="question",
     *      tags={"quiz"},
     *      summary="Start a new Quiz",
     *      description="Returns a newly registered user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/QuizCreateFormRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful signup",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * )
     */
    public function store(QuizCreateFormRequest $request)
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

		return $this->showOne($quiz);
    }

    public function fillArray($value, $len) {
	  	$arr = [];
	  	for ($i = 0; $i < $len; $i++) {
	    	$arr[] = $value;
	  	}
	  	return $arr;
	}
}
