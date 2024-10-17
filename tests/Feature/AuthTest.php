<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase {

  public function test_login_redirects_to_jobs_page(): void {
    $response = $this->post('/auth', [
      '_token' => csrf_token(),
      'email' => 'wasimhyder09@gmail.com',
      'password' => 'password',
    ]);
    $this->assertAuthenticated();
    $response->assertStatus(302);
    $response->assertRedirect('/jobs');
  }

  public function test_unathenticated_user_cannot_access_my_jobs_page(): void {
    $response = $this->get('/my-jobs');

    $response->assertStatus(302);
    $response->assertRedirect('/login');
  }
}
