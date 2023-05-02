<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class CompanyAddTest extends TestCase
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

        $response = $this->withHeader('Authorization','Bearer '.$token)->post('/api/admin/addCompany',
            [
                'name' => Str::random(),
                'file' => UploadedFile::fake(),
                'priority' => 1,
                'max_amount' => 100000,
                'age_min' => 18,
                'age_max' => 65,
                'consideration_period' => 1,
                'period_min' => 1,
                'period_max' => 12,
                'amount_deal' => 100000,
                'amount_lead' => 10000,
                'link' => 'https://i-credit.kz',
            ]);
       // dd($response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(true, $response->json()['success']);
    }
}
