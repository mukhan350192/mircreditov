<?php

namespace App\Console\Commands;

use App\Models\Click;
use App\Models\Company;
use App\Models\Postback;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailyEPC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:epc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily update epc for company';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $companyIDs = Company::all('id');
        foreach ($companyIDs as $companyID) {
            $clickCount = Click::where('companyID', $companyID)->count();
            $amount = Postback::where('companyID', $companyID)->sum('amount');
            $epc = $amount / $clickCount;
            $companyEPC = DB::table('company_epc')->where('company_id', $companyID)->first();
            if (!$companyEPC) {
                DB::table('company_epc')->insertGetId([
                    'company_id' => $companyID,
                    'click_count' => $clickCount,
                    'amount' => $amount,
                    'epc' => $epc,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                continue;
            }
            DB::table('company_epc')->where('id', $companyEPC->id)->update([
                'click_count' => $clickCount,
                'amount' => $amount,
                'epc' => $epc,
                'updated_at' => Carbon::now(),
            ]);
        }
        return Command::SUCCESS;
    }
}
