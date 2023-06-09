<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyDeleteRequest;
use App\Http\Requests\CompanyEditRequest;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\OfferService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    /**
     * @param CompanyRequest $request
     * @return JsonResponse
     */
    //create unit test for this method
    public function add(CompanyRequest $request):JsonResponse
    {
        dd($request->all());
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

    /**
     * @param CompanyEditRequest $request
     * @return JsonResponse
     */
    public function edit(CompanyEditRequest $request): JsonResponse
    {
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

    /**
     * @param CompanyDeleteRequest $request
     * @return JsonResponse
     */
    public function remove(CompanyDeleteRequest $request): JsonResponse
    {
        return Company::remove($request->companyID);
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = [
            'baseURL' => 'https://back.mircreditov.kz/company/',
            'data' => CompanyResource::collection(DB::table('company')->get()),
        ];
        return response()->success($data);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function offers(Request $request): JsonResponse
    {
        $offer = new OfferService();
        return $offer->showOffers($request->phone);
    }
}
