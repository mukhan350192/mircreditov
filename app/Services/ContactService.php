<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function addContact(string $phone, string $email)
    {
        $data = DB::table('data_users')->where('phone', $phone)->where('email', $email)->first();
        if (!$data) {
            DB::table('data_users')->insertGetId([
                'phone' => $phone,
                'email' => $email,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return response()->success([]);
    }
}
