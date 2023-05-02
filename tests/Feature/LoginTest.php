<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/api/login',[
            'email' => 'mukhan@i-credit.kz',
            'password' => '12345678',
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(true, $response->json()['success']);

    }
}
