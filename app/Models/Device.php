<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'device';
    protected $fillable = [
        'device',
        'token',
        'city',
        'ip'
    ];

    public static function create(
        string|null $device,
        string $token,
        string|null $city,
        string $ip
    ){
        $device = Device::query()->create([
           'device' => $device,
           'token' => $token,
           'city' => $city,
           'ip' => $ip
        ]);
        if (!$device){
            return response()->fail('Попробуйте позже');
        }
        return response()->success([]);
    }
}
