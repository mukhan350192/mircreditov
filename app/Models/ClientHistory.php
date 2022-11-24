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
    public static function create(
        string $token,
        string|null $phone,
        string $action,
        string|null $utm_source,
        string|null $utm_content,
        string|null $utm_medium,
        string|null $utm_term,
        string|null $utm_campaign,
        string|null $web_id
    )
    {
        $data = ClientHistory::query()->create([
            'token' => $token,
            'phone' => $phone,
            'action' => $action,
            'utm_source' => $utm_source,
            'utm_content' => $utm_content,
            'utm_medium' => $utm_medium,
            'utm_term' => $utm_term,
            'utm_campaign' => $utm_campaign,
            'web_id' => $web_id,
        ]);
        if (!$data){
            return response()->fail('Попробуйте позже');
        }
        return response()->success([]);
    }
}
