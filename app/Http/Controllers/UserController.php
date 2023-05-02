<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function register(UserRequest $request): JsonResponse
    {
        return User::create(
            $request->name,
            $request->email,
            $request->password
        );
    }

    /**
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request): JsonResponse
    {
        return User::check(
            $request->email,
            $request->password
        );
    }

    public function addContact(ContactRequest $request)
    {
        $contact = new ContactService();
        return $contact->addContact($request->phone, $request->email);
    }
}
