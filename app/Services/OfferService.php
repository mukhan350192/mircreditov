<?php
namespace App\Services;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class OfferService{
    public function showOffers(){
        $companyID = DB::table('company_epc')->select('company_id')->orderByDesc('epc')->get();
        $data = [];
        foreach ($companyID as $id){
            $data[] = $id->company_id;
        }
        return CompanyResource::collection(Company::whereIn('id',[$data])->get());
    }
}
