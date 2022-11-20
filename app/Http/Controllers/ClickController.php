<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClickRequest;
use App\Models\Click;
use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function newClick(ClickRequest $request){
        return Click::create($request->phone,$request->clickID,$request->companyID);
    }
}
