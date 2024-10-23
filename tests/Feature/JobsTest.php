<?php

namespace Tests\Feature;

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobsTest extends TestCase {
//  public function test_jobs_table_is_empty(): void {
//    $response = $this->get('/jobs');
//
//    $response->assertStatus(200);
//    $response->assertSee('No jobs found!');
//  }

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

  public function test_user_has_access_to_page() : void {
    $user = $this->adminUser();
    $response = $this->actingAs($user)->get('/my-jobs');
    $response->assertStatus(200);
  }

  public function test_create_job_successful(): void {
    $job = [
      'title' => 'Test Job',
      'location' => 'Lahore',
      'salary' => '90000',
      'description' => 'short description',
      'experience' => 'senior',
      'category' => 'Sales',
    ];
    $response = $this->actingAs($this->adminUser())->post('/my-jobs', $job);
    $response->assertStatus(302);
    $response->assertRedirect('/my-jobs');

    $this->assertDatabaseHas('jobs', $job);

    $lastJob = Job::latest()->first();
    $this->assertEquals($job['title'], $lastJob->title);
  }

//  public function test_job_update_contains_correct_values(): void {
//    $job = Job::factory()->create(['employer_id' => $this->adminUser()->id]);
//    $response = $this->actingAs($this->adminUser())->get('/my-jobs/' . $job->id . '/edit');
//
//    $response->assertStatus(200);
//    $response->assertSee('value="' . $job->title . '"', false);
//    $response->assertSee('value="' . $job->salary . '"', false);
//  }

  private function adminUser(): User {
    return User::findOrFail(1);
  }

}
