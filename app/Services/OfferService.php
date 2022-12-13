<?php
namespace App\Services;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class OfferService{
    public function showOffers($phone){
        $companyID = DB::table('company_epc')
                ->join('company','company_epc.company_id','=','company.id')
                ->select('company.*')
                ->orderByDesc('epc')
                ->get();
/*
        $data = [];
        if (!$companyID){
            return response()->success([]);
        }*/
        $http = new Client(['verify' => false]);
        $result = $http->get("https://icredit-crm.kz/api/webhock/mircreditov/search.php?phone=$phone");
        $result = json_decode($result->getBody()->getContents());
        $data['client'] = false;
        if ($result && $result->success === true){
            $data['client'] = true;
        }


        $data['data'] = CompanyResource::collection($companyID);
        //return response()->success($result);
        return $data;
    }
}
