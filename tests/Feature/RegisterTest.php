<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        $response = $this->post('/api/register',[
            'name' => 'test',
            'email' => Str::random(8).'@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
    }
}
