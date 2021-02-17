<?php


namespace App\Services;

use App\Models\Quiz;

class QuizService implements ServiceInterface
{
    public function register($request)
    {
        $job = $this->hydrateRequest($request);

        return $this->repository->save($job);
    }
}
