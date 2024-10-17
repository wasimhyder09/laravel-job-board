<?php

namespace Tests\Feature;

use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobsTest extends TestCase {
  public function test_jobs_table_is_empty(): void {
    $response = $this->get('/jobs');

    $response->assertStatus(200);
    $response->assertSee('No jobs found!');
  }

  public function test_jobs_table_is_not_empty(): void {
    $response = $this->get('/jobs');

    $response->assertStatus(200);
    $response->assertDontSee('No jobs found!');
  }

  public function test_jobs_variable_has_values(): void {
    $job = Job::findOrFail(1);

    $response = $this->get('/jobs');

    $response->assertStatus(200);
    $response->assertViewHas('jobs', function ($collection) use ($job) {
      return $collection->contains($job);
    });
  }

}
