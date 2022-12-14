<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckRequest;
use App\Http\Requests\CompanyDeleteRequest;
use App\Http\Requests\CompanyEditRequest;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    public function add(CompanyRequest $request){
        return Company::create(
            $request->name,
            $request->file('logo'),
            $request->priority,
            $request->max_amount,
            $request->age_min,
            $request->age_max,
            $request->consideration_period,
            $request->period_min,
            $request->period_max,
            $request->amount_deal,
            $request->amount_lead,
            $request->link
        );
    }

    public function edit(CompanyEditRequest $request){
        return Company::edit(
            $request->companyID,
            $request->name,
            $request->priority,
            $request->max_amount,
            $request->age_min,
            $request->age_max,
            $request->consideration_period,
            $request->period_min,
            $request->period_max,
            $request->amount_deal,
            $request->amount_lead,
            $request->link
        );
    }

    public function remove(CompanyDeleteRequest $request){
        return Company::remove($request->companyID);
    }

    public function index(CheckRequest $request){
        return CompanyResource::collection(DB::table('company')->get());
    }

    public function offers(Request $request){
        $offer = new OfferService();
        return $offer->showOffers($request->phone);
    }
}
