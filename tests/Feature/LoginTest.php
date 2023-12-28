<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUserCanLogin(): void
    {
         $res = $this->withHeaders([
            'XSRF-TOKEN' => csrf_token(),
         ])->post('login/process', [
             'nisn' => '1234567891',
             'password' => 'teguhbudi'
         ]);

         $res->assertStatus(302);
         $this->assertAuthenticated();
    }
}
