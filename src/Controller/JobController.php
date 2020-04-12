<?php


namespace Controller;

use Core\Controller;
use Model\JobModel;

class JobController extends Controller
{
    public function jobAction()
    {
        $job = new JobModel();
        $jobs = $job->get_job();
        $this->render('job', [
            'jobs' => $jobs
        ]);
    }
}
