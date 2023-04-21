<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Events\Hello;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//Route::get('/login', 'HomeController@index');
Route::get('/', 'HomeController@landing');
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('/pharmacy/customer', 'HomeController@customer');



// --------DPD -> AS route-----------
// Route::group(['middleware' => ['ADMIN']], function () {
    Route::get('/pharmacy/dashboard/home', function () { return view('Dashboard'); });
    Route::get('/pharmacy/dashboard/userRegistration', function () { return view('Dashboard'); });
    Route::get('/pharmacy/dashboard/user', function () { return view('Dashboard'); });
    Route::get('/pharmacy/dashboard/service', function () { return view('Dashboard'); });
    Route::get('/pharmacy/dashboard/customer', function () { return view('Dashboard'); });

    Route::get('/pharmacy/dashboard/pharmacy', function () { return view('Dashboard'); });
    Route::get('/pharmacy/dashboard/order', function () { return view('Dashboard'); });

//});

