<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * @param ContactRequest $request
     * @param ContactService $service
     * @return JsonResponse
     */
    public function addContact(ContactRequest $request, ContactService $service): JsonResponse
    {
        return $service->addContact($request->phone, $request->email);
    }
}
