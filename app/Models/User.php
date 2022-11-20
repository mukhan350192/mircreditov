<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
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

    public static function create(string $name, string $email, string $password)
    {
        $token = sha1(Str::random().time());
        $userID = User::query()->insertGetId([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'token' => $token,
        ]);
        if ($userID) {
            return response()->success(['token' => $token]);
        }
        return response()->fail('Попробуйте позже');
    }

    public static function check(string $email,string $password){
        $token = sha1(Str::random().time());
        $user = User::where('email',$email)->first();
        if (Hash::check($password,$user->password)){
            $user->token = $token;
            $user->save();
            $data = [
                'token' => $token,
            ];
            return response()->success($data);
        }
        return response()->fail('Не совпадает логин и пароль');
    }
}
