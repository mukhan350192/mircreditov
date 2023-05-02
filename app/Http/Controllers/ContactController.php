<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(ContactRequest $request,ContactService $service){
        return $service->addContact($request->phone, $request->email);
    }
}
