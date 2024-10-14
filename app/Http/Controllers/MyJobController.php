<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller {
  public function index() {
    return view('my_jobs.index',
      [
        'jobs' => auth()->user()->employer
          ->jobs()
          ->with('employer', 'jobApplications', 'jobApplications.user')
          ->latest()
          ->get()
      ]);
  }

  public function create() {
    return view('my_jobs.create');
  }

  public function store(JobRequest $request) {
    auth()->user()->employer->jobs()->create($request->validated());
    return redirect()->route('my-jobs.index')
      ->with('success', 'Job created successfully.');
  }

  public function show(string $id) {
    //
  }

  public function edit(Job $myJob) {
    return view('my_jobs.edit', ['job' => $myJob]);
  }

  public function update(JobRequest $request, Job $myJob) {
    $myJob->update($request->validated());
    return redirect()->route('my-jobs.index')->with('success', 'Job updated successfully.');
  }

  public function destroy(string $id) {
    //
  }
}
