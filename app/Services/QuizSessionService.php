<?php

namespace App\Services;

use App\Models\QuizSession;

class QuizSessionService
{
    public function register($request)
    {
    	$session = 0;

        $findLastSession = QuizSession::where('class_schedule_id', $request['class_schedule_id'])->
            where('user_id', auth()->user()->id)->where('end', false)->first();

        if($findLastSession){
            $findLastSession->end = true;
            $findLastSession->save();
            $session = $findLastSession->session ?  $findLastSession->session : 0;
        }

    	$model = new QuizSession;
        $model->session = $session + 1;
        $model->user_id = auth()->user()->id;
        $model->class_schedule_id = $request['class_schedule_id'];
        $model->save();

        return $model;
    }
}
