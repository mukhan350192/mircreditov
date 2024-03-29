<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    public $table = 'company';
    protected $fillable = [
        'name',
        'logo',
        'priority',
        'max_amount',
        'age_min',
        'age_max',
        'consideration_period',
        'period_min',
        'period_max',
        'amount_deal',
        'amount_lead',
    ];

    public static function create(
        string $name,
        $logo,
        int|null $priority,
        int $max_amount,
        int $age_min,
        int $age_max,
        int $period,
        int $period_min,
        int $period_max,
        int|null $amount_deal,
        int|null $amount_lead,
        string $link
    ){
        $imageName = sha1(Str::random(16).time()).'.'.$logo->getClientOriginalExtension();
        $data = [
            'name' => $name,
            'logo' => $imageName,
            'priority' => !$priority?:0,
            'max_amount' => $max_amount,
            'age_min' => $age_min,
            'age_max' => $age_max,
            'consideration_period' => $period,
            'period_min' => $period_min,
            'period_max' => $period_max,
            'link' => $link,
            'amount_deal' => $amount_deal,
            'amount_lead' => $amount_lead,
        ];
        $companyID = Company::query()->insertGetId($data);

        $logo->move(public_path('/company'),$imageName);

        if ($companyID){
            DB::table('company_epc')->insertGetId([
                'company_id' => $companyID,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return response()->success([
                'name' => $name,
                'priority' => $priority,
                'max_amount' => $max_amount,
                'age_min' => $age_min,
                'age_max' => $age_max,
                'consideration_period' => $period,
                'period_min' => $period_min,
                'period_max' => $period_max,
                'amount_deal' => $amount_deal,
                'amount_lead' => $amount_lead,
                'link' => $link,
                'id' => $companyID,
            ]);
        }
        return response()->fail('');
    }

    public static function remove(int $companyID){
        $result = Company::where('id',$companyID)->delete();
        return response()->success();
    }

    public static function edit(
        int $companyID,
        string $name,
        int|null $priority,
        int $max_amount,
        int $age_min,
        int $age_max,
        int $consideration_period,
        int $period_min,
        int $period_max,
        int|null $amount_deal,
        int|null $amount_lead,
        string $link
    ){
        $update = Company::where('id',$companyID)->update([
           'name' => $name,
            'priority' => $priority,
            'max_amount' => $max_amount,
            'age_min' => $age_min,
            'age_max' => $age_max,
            'consideration_period' => $consideration_period,
            'period_min' => $period_min,
            'period_max' => $period_max,
            'amount_deal' => $amount_deal,
            'amount_lead' => $amount_lead,
            'link' => $link
        ]);

        if ($update){
            return response()->success([]);
        }
        return response()->fail('Попробуйте позже');
    }
}
