<?php

namespace App\Http\Controllers\Api\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassSchedule;

class ClassScheduleController extends Controller
{
	/**
    * @OA\Get(
    *      path="/api/v1/class",
    *      operationId="userProfile",
    *      tags={"Schedule"},
    *      summary="List of class schedules",
    *      description="List of class schedules",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
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
    *      security={ {"bearerAuth": {}} },
    * )
    */
   
    public function index()
    {
    	return $this->showAll(ClassSchedule::all());
    }
}
