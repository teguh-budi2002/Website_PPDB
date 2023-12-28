<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPaymentFormTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUserCanPayFormAdministration(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
