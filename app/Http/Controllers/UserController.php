<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ContactService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(UserRequest $request){
        return User::create(
            $request->name,
            $request->email,
            $request->password
        );
    }

    public function login(UserLoginRequest $request){
        return User::check(
            $request->email,
            $request->password
        );
    }

    public function addContact(ContactRequest $request){
        $contact = new ContactService();
        return $contact->addContact($request->phone,$request->email);
    }
}
