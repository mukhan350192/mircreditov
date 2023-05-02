<?php

use App\Http\Controllers\ClickController;
use App\Http\Controllers\ClientHistoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PostbackController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('mk')->group(function(){
    Route::post('postback',[PostbackController::class,'postback']);
});
// create,login
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);

//admin
Route::middleware(['auth:sanctum','abilities:admin'])->group(function():void{
    Route::prefix('admin')->group(function(){
        Route::post('/addCompany',[CompanyController::class,'add']);
        Route::post('/deleteCompany',[CompanyController::class,'remove']);
        Route::post('/edit',[CompanyController::class,'edit']);
        Route::get('/showCompany',[CompanyController::class,'index']);
        Route::prefix('news')->group(function(){
            Route::post('create',[NewsController::class,'create']);
            Route::post('remove',[NewsController::class,'remove']);
            Route::post('edit',[NewsController::class,'edit']);
            Route::get('show',[NewsController::class,'show']);
        });
    });

});
// addHistory
Route::post('/addHistory',[ClientHistoryController::class,'addHistory']);
// click
Route::post('/newClick',[ClickController::class,'newClick']);
//device
Route::get('/device',[DeviceController::class,'device']);
//client area
Route::get('/offers',[OfferController::class,'getOffer']);

//contact
Route::post('/addContact',[ContactController::class,'addContact']);
