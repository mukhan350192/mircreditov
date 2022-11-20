<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    protected $table = 'click_actions';

    protected $fillable = [
        'phone',
        'clickID',
        'companyID'
    ];

    public static function create(
        string $phone,
        string $clickID,
        int    $companyID
    )
    {
        $click = Click::query()->create([
            'phone' => $phone,
            'clickID' => $clickID,
            'companyID' => $companyID,
        ]);
        if ($click) {
            return response()->success([]);
        }
        return response()->fail('Попробуйте позже');
    }
}
