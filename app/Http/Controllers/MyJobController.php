<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobController extends Controller {
  public function index() {
    return view('my_jobs.index');
  }

  public function create() {
    return view('my_jobs.create');
  }

  public function store(Request $request) {
    //
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
