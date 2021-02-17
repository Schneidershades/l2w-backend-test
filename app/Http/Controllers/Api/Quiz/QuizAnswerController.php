<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use App\Services\QuizAnswerService;
use App\Http\Requests\Quiz\QuizAnswerCreateFormRequest;

class QuizAnswerController extends Controller
{
    private $service;

    public function __construct(QuizAnswerService $service)
    {
        $this->service = $service;
    }

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
        return $this->service->register($request);
    }
}
