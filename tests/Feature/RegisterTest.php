<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testUserCanRegister(): void
    {
        $res = $this->post('register/process', [
            'role_id' => 2,
            'fullname' => "TESTING",
            'email' => "test@gmail.com",
            'nisn' => "1234567892",
            'birth_place' => "CITY TEST",
            'birth_day' => Carbon::now()->format('d F Y'),
            'phone_number' => '08773662738',
            'password' => Hash::make('testing123'),
            'g-recaptcha-response' => 1
        ]);
        
        $res->assertStatus(302);
    }
}
