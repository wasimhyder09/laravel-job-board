<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobApplicationController extends Controller {
  use AuthorizesRequests;
  public function create(Job $job) {
    $this->authorize('apply', $job);
    return view('job_application.create', ['job' => $job]);
  }

  public function store(Job $job, Request $request) {
    $this->authorize('apply', $job);
    $request->validate([
      'expected_salary' => 'required|min:1|max:10000000',
    ]);
    $job->jobApplications()->create([
      'user_id' => $request->user()->id,
      'expected_salary' => $request->expected_salary
    ]);
    return redirect()->route('jobs.show', ['job' => $job])->with('success', 'Job application submitted successfully!');
  }


  public function destroy(string $id) {
    //
  }
}
