<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use App\Models\QuizSession;
use App\Http\Requests\Quiz\QuizSessionCreateFormRequest;

class QuizSessionController extends Controller
{
	 /**
     * @OA\Post(
     *      path="/api/v1/quiz/start",
     *      operationId="session",
     *      tags={"quiz"},
     *      summary="Start a new Quiz",
     *      description="Returns a newly registered user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/QuizSessionCreateFormRequest")
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
    
    public function store(QuizSessionCreateFormRequest $request)
    {
        $session = 0;

        $findLastSession = QuizSession::where('class_schedule_id', $request['class_schedule_id'])
            ->where('end', false)->first();

        if($findLastSession){
            $findLastSession->end = true;
            $findLastSession->save();
            $session = $findLastSession->session ?  $findLastSession->session : 0;
        }

    	$model = new QuizSession;
        $model->session = $session + 1;
        $model->class_schedule_id = $request['class_schedule_id'];
        $model->save();

        return $model;
    }
}
