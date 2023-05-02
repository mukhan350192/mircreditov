<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return JsonResponse
     */
    public static function create(string $name, string $email, string $password): JsonResponse
    {
        $user = self::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        $token = $user->createToken('api', ['admin'])->plainTextToken;

        return response()->success(['token' => $token]);
    }

    /**
     * @param string $email
     * @param string $password
     * @return JsonResponse
     */

    public static function check(string $email, string $password)
    {
        $user = User::where('email', $email)->first();
        if (Hash::check($password, $user->password)) {
            $token = $user->createToken('api', ['admin'])->plainTextToken;
            return response()->success(['token' => $token]);
        }
        return response()->fail('Не совпадает логин и пароль');
    }
}
