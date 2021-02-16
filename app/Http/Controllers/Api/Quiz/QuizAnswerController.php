<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\MultipleChoice;
use App\Http\Requests\Quiz\QuizAnswerCreateFormRequest;

class QuizAnswerController extends Controller
{
     /**
     * @OA\Post(
     *      path="/api/v1/quiz/answer",
     *      operationId="answer",
     *      tags={"quiz"},
     *      summary="Start a new Quiz",
     *      description="Returns a newly registered user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/QuizAnswerCreateFormRequest")
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
    
    public function store(QuizAnswerCreateFormRequest $request)
    {
        // find multiple choice id
        $choice = MultipleChoice::where('id', $request['multiple_choice_id'])->first();
        $selectedQuiz = Quiz::where('id', $request['quiz_id'])->first();

        if(!$choice){
            return $this->errorResponse('Multiple choice error at the moment', 409);
        }

        // store
    	$quiz = QuizAnswer::where('quiz_id', $request['quiz_id'])
                    ->where('quiz_session_id', $request['quiz_session_id'])
                    ->first();

    	if($quiz==null){
    		$quiz = new QuizAnswer;
    	}

        $quiz->quiz_id = $request['quiz_id'];
        $quiz->quiz_session_id = $request['quiz_session_id'];
        $quiz->correct = $choice->correct == true ? $quiz->correct+1 : $quiz->fail+1;
		$quiz->attempts = $choice->correct == true ? $selectedQuiz->attempts-1 : $selectedQuiz->attempts+1;
		$quiz->save(); 

    }
}
