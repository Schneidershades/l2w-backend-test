<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Services\QuizService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\QuizCreateFormRequest;

class QuizController extends Controller
{
    private $service;

    public function __construct(QuizService $service)
    {
        $this->service = $service;
        $this->middleware(['auth:api']);
    }
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
        if ($this->service->register($request) == null){
            return $this->showMessage(false);
        }
        return $this->showOne($this->service->register($request));
    }
}
