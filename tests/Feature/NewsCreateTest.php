<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class NewsCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = $this->post('api/login',[
            'email' => 'mukhan@i-credit.kz',
            'password' => '12345678',
        ]);
        $token = $user->json()['token'];

        $response = $this->withHeader('Authorization','Bearer '.$token)->post('/api/admin/news/create',
            [
                'title' => Str::random(),
                'mini_description' => Factory::create()->text,
                'description' => Factory::create()->text,
            ]);

        User::where('email','mukhan@i-credit.kz')->first()->currentAccessToken()->delete();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(true, $response->json()['success']);
    }
}
