<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use Illuminate\Http\JsonResponse;


class DeviceController extends Controller
{
    /**
     * @param DeviceRequest $request
     * @return JsonResponse
     */
    public function device(DeviceRequest $request): JsonResponse{
        return Device::create(
           $request->device,
           $request->token,
           $request->city,
           $request->ip
        );
    }
}
