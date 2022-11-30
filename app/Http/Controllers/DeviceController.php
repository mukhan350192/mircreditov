<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function device(DeviceRequest $request){
        return Device::create(
           $request->device,
           $request->token,
           $request->city,
           $request->ip
        );
    }
}
