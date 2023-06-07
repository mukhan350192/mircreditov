<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClickRequest;
use App\Models\Click;
use Illuminate\Http\JsonResponse;

class ClickController extends Controller
{
    /**
     * @param ClickRequest $request
     * @return JsonResponse
     */
    public function newClick(ClickRequest $request): JsonResponse
    {
        return Click::create($request->phone, $request->clickID, $request->companyID);
    }
}
