<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\example\ExampleController;
use App\Http\Controllers\LecoCustomerController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserProfileController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//-------------------------check user login is invalid ----------------------------
Route::post('checkLogin', [
    'uses' => 'Auth\AuthController@checkLogin'
]);




//------------------------- user login ----------------------------
Route::post('user/login', [
    'uses' => 'UserController@login'
]);

Route::middleware('auth:api')->post('user/checkTokenValidity', [
    'uses' => 'UserController@checkTokenValidity'
]);

Route::middleware('auth:api')->group(function () {

    Route::get('user/profile', [RegisterController::class, 'loggedprofile']);
    Route::post('user/logout', [RegisterController::class, 'logout']);
});

Route::post('user/register', [RegisterController::class, 'register']);
Route::post('user/deactive', [RegisterController::class, 'delete']);

Route::get('user/show/{id}', [RegisterController::class, 'show']);
Route::put('/user/update{id}', [RegisterController::class, 'update']);
Route::get('user/all', [RegisterController::class, 'index']);

Route::post('user/resetPassword', [RegisterController::class, 'resetPassword']);


Route::post('pharmacy/near', [PharmacyController::class, 'getNearPharmacy']);
Route::get('pharmacy/all', [PharmacyController::class, 'all']);
Route::get('pharmacy/favorite', [PharmacyController::class, 'getFavoritePharmacy']);

Route::post('pharmacy/order', [PharmacyController::class, 'orderRequest']);

Route::post('pharmacy/orderlist', [PharmacyController::class, 'getOrderList']);
Route::post('pharmacy/ordercomleted', [PharmacyController::class, 'orderComleted']);
Route::post('pharmacy/addinventory', [PharmacyController::class, 'addPharmacyInventory']);
Route::post('pharmacy/stockdele', [PharmacyController::class, 'inventoryItemDelete']);

Route::post('pharmacy/getitemname', [PharmacyController::class, 'getItemName']);
Route::post('pharmacy/order', [PharmacyController::class, 'getOderList']);









Route::get('patient/stock', [PharmacyController::class, 'searchPharmacyStock']);
Route::post('patient/invoice', [PharmacyController::class, 'getInvoice']);
Route::post('patient/payment', [PharmacyController::class, 'submittedPayment']);





Route::get('/patient/previous/{id}', [ServicesController::class, 'previousOrder']);



Route::get('/services/all', [ServicesController::class, 'index']);
Route::post('/services/register', [ServicesController::class, 'store']);
Route::get('/services/show/{id}', [ServicesController::class, 'show']);
Route::post('/services/update', [ServicesController::class, 'update']);
Route::delete('/services/destroy/{id}', [ServicesController::class, 'destroy']);



Route::get(
    '/customer/existing/{accountnumber}/{lat}/{lng}',
    [
        LecoCustomerController::class,
        'existingCustomerDetails'
    ]
);
Route::post(
    '/customer/reqesting',
    [
        LecoCustomerController::class,
        'requestingServices'
    ]
);
Route::get(
    '/customer/history/{accountnumber}',
    [
        LecoCustomerController::class,
        'historyOfServices'
    ]
);
Route::get(
    '/agent/history/{id}',
    [
        AgentController::class,
        'index'
    ]
);

Route::get(
    '/pharmacy/stock/{id}',
    [
        ServicesController::class,
        'getpharmacystock'
    ]
);


Route::get('/users', [ExampleController::class, 'index']);
Route::post('/users', [ExampleController::class, 'store']);
Route::get('/users/{id}', [ExampleController::class, 'show']);
Route::put('/users/{id}', [ExampleController::class, 'update']);
Route::delete('/users/{id}', [ExampleController::class, 'destroy']);

Route::get('/usersprofile', [UserProfileController::class, 'index']);
Route::post('/usersprofile', [UserProfileController::class, 'create']);
Route::get('/usersprofile/{id}', [UserProfileController::class, 'show']);
Route::put('/usersprofile/{id}', [UserProfileController::class, 'update']);


