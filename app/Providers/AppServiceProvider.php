<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success',function (array $data){
            return response()->json([
               'success' => true,
                'data' => $data,
                'errorMessage' => null,
            ]);
        });

        Response::macro('fail',function (string $message){
            return response()->json([
                'success' => false,
                'data' => null,
                'errorMessage' => mb_convert_encoding($message, "UTF-8", "auto"),
            ]);
        });
    }
}
