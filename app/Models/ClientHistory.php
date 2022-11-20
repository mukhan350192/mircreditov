<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientHistory extends Model
{
    use HasFactory;

    protected $table = 'client_history';
    protected $fillable = [
      'token',
      'phone',
      'action'
    ];
    public static function create(string $token, string|null $phone, string $action)
    {
        $data = ClientHistory::query()->create([
            'token' => $token,
            'phone' => $phone,
            'action' => $action,
        ]);
        if (!$data){
            return response()->fail('Попробуйте позже');
        }
        return response()->success([]);
    }
}
