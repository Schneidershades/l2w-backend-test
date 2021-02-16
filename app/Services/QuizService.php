<?php


namespace App\Services;

use App\Models\Job;
use App\Repositories\Interfaces\JobRepositoryInterface;

class QuizService implements ServiceInterface
{
     /**
     * @var JobRepositoryInterface
     */
    private $repository;

    public function __construct(JobRepositoryInterface $repository) 
    {
        $this->repository = $repository;
    }

    public function register($request)
    {
        $job = $this->hydrateRequest($request);

        return $this->repository->save($job);
    }
    /**
     * @param Request $request
     * @return Job
     */
    protected function hydrateRequest($request)
    {
        $model = new Job;

        return $this->repository->requestAndDbIntersection($request, $model);
    }
}
