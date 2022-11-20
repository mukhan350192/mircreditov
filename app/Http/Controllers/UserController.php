<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(UserRequest $request){
        return User::create(
            $request->name,
            $request->email,
            $request->password,
        );
    }

    public function login(UserLoginRequest $request){
        return User::check(
            $request->email,
            $request->password
        );
    }
}
