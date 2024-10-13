<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller {
  public function index() {
    return view('my_jobs.index');
  }

  public function create() {
    return view('my_jobs.create');
  }

  public function store(Request $request) {
    $validatedData = $request->validate([
      'title' => 'required|max:255|string',
      'location' => 'required|max:255|string',
      'salary' => 'required|min:0000|numeric',
      'description' => 'required|string',
      'experience' => 'required|in:'.implode(',', Job::$experience),
      'category' => 'required|in:'.implode(',', Job::$category),
    ]);

    auth()->user()->employer->jobs()->create($validatedData);
    return redirect()->route('my-jobs.index')
      ->with('success', 'Job created successfully.');
  }

  public function show(string $id) {
    //
  }

  public function edit(string $id) {
    //
  }

  public function update(Request $request, string $id) {
    //
  }

  public function destroy(string $id) {
    //
  }
}
