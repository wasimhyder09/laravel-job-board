<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobsTest extends TestCase {
  /**
   * Check if jobs table is empty or not
   */
  public function test_jobs_table_is_empty(): void {
    $response = $this->get('/jobs');

    $response->assertStatus(200);
    $response->assertSee('No jobs found!');
  }
}
