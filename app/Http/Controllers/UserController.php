<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(UserRequest $request){
        return User::create(
            $request->name,
            $request->email,
            $request->password,
        );
    }
}
