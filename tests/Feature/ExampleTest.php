<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->post('/signup', ['email' => 'ouhssizni@gmail.com', 'password' => "password",'name' => 'ali jamal']);

        $response->assertStatus(200);
    }
}
