<?php

namespace App\Http\Controllers;

use App\Services\OfferService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * @param Request $request
     * @param OfferService $service
     */
    public function getOffer(Request $request, OfferService $service){
        return $service->showOffers($request->phone);
    }
}
