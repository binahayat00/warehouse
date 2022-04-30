<?php

use App\Http\Controllers\Api\BuyController;
use App\Http\Controllers\Api\BuysConfirmController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ConfirmController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\RequestDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JWTAuthController;
use App\Http\Controllers\Api\RequestsConfirmController;
use App\Http\Controllers\Api\RequestsDetailsConfirmController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\UsersConfirmController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\UserController;

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

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', [JWTAuthController::class, 'logout']);
});

Route::controller(ProductController::class)->group(function () {
    Route::get('products/all', 'getAll');
    Route::post('products/store', 'store');
    Route::delete('products/delete/{id}', 'delete');
    Route::put('products/update', 'update');
});

Route::controller(RequestController::class)->group(function () {
    Route::get('requests/all', 'getAll');
    Route::post('requests/store', 'store');
    Route::delete('requests/delete/{id}', 'delete');
    Route::put('requests/update', 'update');
    Route::post('request/RequestDetails/store', 'storeRequestAndRequestDetails');
    Route::post('getCurrentDate', 'getCurrentDate');
    Route::get('requests/user', 'allRequestsOfUserId');
    Route::get('requests/confirms/user', 'allRequestConfirmsByUserId');
    Route::get('requests/delivery', 'allRequestsByDeliveryId');
    Route::get('requests/userConfirms', 'allConfirmsOfUserId');
});

Route::controller(RequestDetailController::class)->group(function () {
    Route::get('requestdetails/all', 'getAll');
    Route::post('requestdetails/store', 'store');
    Route::delete('requestdetails/delete/{id}', 'delete');
    Route::put('requestdetails/update', 'update');
    Route::put('requestdetails/updateDeliveryId', 'updateDeliveryId');
});

Route::controller(BuysConfirmController::class)->group(function () {
    Route::get('buysconfirms/all', 'getAll');
    Route::post('buysconfirms/store', 'store');
    Route::delete('buysconfirms/delete/{id}', 'delete');
    Route::put('buysconfirms/update', 'update');
});

Route::controller(BuyController::class)->group(function () {
    Route::get('buys/all', 'getAll');
    Route::post('buys/store', 'store');
    Route::delete('buys/delete/{id}', 'delete');
    Route::put('buys/update', 'update');
});

Route::controller(ConfirmController::class)->group(function () {
    Route::get('confirms/all', 'getAll');
    Route::post('confirms/store', 'store');
    Route::delete('confirms/delete/{id}', 'delete');
    Route::put('confirms/update', 'update');
});

Route::controller(UsersConfirmController::class)->group(function () {
    Route::get('usersConfirms/all', 'getAll');
    Route::post('usersConfirms/store', 'store');
    Route::delete('usersConfirms/delete/{id}', 'delete');
    Route::put('usersConfirms/update', 'update');
    Route::get('usersConfirms/userId', 'getByUserId');
});

Route::controller(FileController::class)->group(function () {
    Route::get('file/all', 'getAll');
    Route::post('file/store', 'store');
    Route::delete('file/delete/{id}', 'delete');
    Route::put('file/update', 'update');
    Route::post('file/storeInStorageAndTable', 'storeFileInStorageAndFileTable');
});

Route::controller(RequestsConfirmController::class)->group(function () {
    Route::get('requestsConfirm/all', 'getAll');
    Route::post('requestsConfirm/store', 'store');
    Route::delete('requestsConfirm/delete/{id}', 'delete');
    Route::put('requestsConfirm/update', 'update');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('category/all', 'getAll');
    Route::post('category/store', 'store');
    Route::delete('category/delete/{id}', 'delete');
    Route::put('category/update', 'update');
});

Route::controller(CategoryConfirmController::class)->group(function () {
    Route::get('categoryConfirm/all', 'getAll');
    Route::post('categoryConfirm/store', 'store');
    Route::delete('categoryConfirm/delete/{id}', 'delete');
    Route::put('categoryConfirm/update', 'update');
});

Route::controller(WarehouseController::class)->group(function () {
    Route::get('warehouse/all', 'getAll');
    Route::post('warehouse/store', 'store');
    Route::delete('warehouse/delete/{id}', 'delete');
    Route::put('warehouse/update', 'update');
});

Route::controller(DeliveryController::class)->group(function () {
    Route::get('delivery/all', 'getAll');
    Route::post('delivery/store', 'store');
    Route::delete('delivery/delete/{id}', 'delete');
    Route::put('delivery/update', 'update');
});

Route::controller(StatusController::class)->group(function () {
    Route::get('status/all', 'getAll');
    Route::post('status/store', 'store');
    Route::delete('status/delete/{id}', 'delete');
    Route::put('status/update', 'update');
});

Route::controller(VehicleController::class)->group(function () {
    Route::get('vehicle/all', 'getAll');
    Route::post('vehicle/store', 'store');
    Route::delete('vehicle/delete/{id}', 'delete');
    Route::put('vehicle/update', 'update');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user/all', 'getAll');
    Route::post('user/store', 'store');
    Route::delete('user/delete/{id}', 'delete');
    Route::put('user/update', 'update');
});

Route::controller(RequestsDetailsConfirmController::class)->group(function () {
    Route::get('requestDetailsConfirms/all', 'getAll');
    Route::post('requestDetailsConfirms/store', 'store');
    Route::delete('requestDetailsConfirms/delete/{id}', 'delete');
    Route::put('requestDetailsConfirms/update', 'update');
    Route::put('requestDetailsConfirms/updateByRequestDetailUserConfirmId', 'updateByRequestDetailIdUserIdAndConfirmId');
});
