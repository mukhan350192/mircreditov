<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
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
        Response::macro('success', function (array $data = []): JsonResponse {
            return response()->json(array_merge($data, [
                'success' => true,
            ]));
        });

        Response::macro('fail', function (string $message, array $data = []): JsonResponse {
            return response()->json(array_merge($data, [
                'success' => false,
                'error' => $message,
            ]));
        });
    }
}
