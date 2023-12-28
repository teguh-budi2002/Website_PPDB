<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserInputDataStudentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUserCanInputDataStudent(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
