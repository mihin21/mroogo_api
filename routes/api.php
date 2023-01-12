<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CoRentalController;
use App\Http\Controllers\Api\RemovePublicationController;
use App\Http\Controllers\API\RentalController;
use App\Http\Controllers\API\SaleController;
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

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::get('salePublication',[SaleController::class,'getSalePublication']);
Route::get('rentalPublication',[RentalController::class,'getRentalPublication']);
Route::get('coRentalPublication',[CoRentalController::class,'getcoRentalPublication']);
//revoir le middleware
Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::post('salePublication',[SaleController::class,'store']);
    Route::get('salePublicationUserConnected',[SaleController::class,'getSaleUserConnected']);
    Route::get('rentalPublicationUserConnected',[RentalController::class,'getRentalUserConnected']);
    Route::get('coRentalPublicationUserConnected',[CoRentalController::class,'getcoRentalPublicationUserConnected']);
    Route::post('rentalPublication',[RentalController::class,'store']);
    Route::post('coRentalPublication',[CoRentalController::class,'store']);
    Route::post('deleteCoRentalPublication/{id}',[CoRentalController::class,'delete']);
    Route::post('deleteRemovalPublication/{id}',[RemovePublicationController::class,'delete']);
    Route::post('deleteSalePublication/{id}',[SaleController::class,'delete']);
    Route::post('deleteRentalPublication/{id}',[RentalController::class,'delete']);
    Route::post('removalPublication',[RemovePublicationController::class,'store']);
    Route::post('updateData',[AuthController::class,'updateData']);
    Route::post('updatePassword',[AuthController::class,'updatePassword']);
});
