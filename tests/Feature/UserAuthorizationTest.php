<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserAuthorizationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUserAuthorization(): void
    {
        $this->get('register');

        $responseRegister = $this->post('register/process', [
            'role_id' => 2,
            'fullname' => "TESTING",
            'email' => "test@gmail.com",
            'nisn' => "1234567892",
            'birth_place' => "CITY TEST",
            'birth_day' => Carbon::now()->format('d F Y'),
            'phone_number' => '08773662738',
            'password' => Hash::make('testing123'),
            'g-recaptcha-response' => 1
        ])->assertStatus(302)->assertRedirectToRoute('login');

        /** User Login */
        $responseLogin = $this->withHeaders([
            'XSRF-TOKEN' => csrf_token(),
         ])->post('login/process', [
             'nisn' => '1234567891',
             'password' => 'teguhbudi'
         ]);

         $responseLogin->assertOk();
         $this->assertAuthenticated();
    }
}
