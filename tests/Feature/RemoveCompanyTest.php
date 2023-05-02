<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Tests\TestCase;

class RemoveCompanyTest extends TestCase
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

        $response = $this->withHeader('Authorization','Bearer '.$token)->post('/api/admin/deleteCompany',
            [
                'companyID' => 1,
            ]);
        // dd($response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(true, $response->json()['success']);
    }
}
