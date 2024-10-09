<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller {
  public function index(User $user, Job $job) {
//    $jobs = Job::w
    return view('my_job_application.index',
    [
      'applications' => auth()->user()->jobApplications()
        ->with([
          'job' => fn($query) => $query->withCount('jobApplications')
            ->withAvg('jobApplications', 'expected_salary'),
          'job.employer'
        ])
        ->latest()->get(),
    ]
    );
  }

  public function destroy(string $id) {
    //
  }
}
