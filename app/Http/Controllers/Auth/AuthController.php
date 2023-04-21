<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller {
    public function __construct() {}

    //---------------------validate user email or mobile number exists------------------
    public function  validateData(Request $request){
        $email              = $request->input('email');
        $mobile             = $request->input('mobile');
        $email_check        = 'all_clear';
        $mobile_check       = 'all_clear';
        $checkEmail         = User::where('email','=',$email)->first();
        $checkMobile        = User::where('mobile','=',$mobile)->whereNotNull('mobile')->first();
        if($checkEmail){
            $email_check    = 'email_exist';
        }
        if($checkMobile){
            $mobile_check   = 'mobile_exist';
        }
        return response()->json(['http_status'=>'ok','email_check'=>$email_check,'mobile_check'=>$mobile_check]);
    }


    //---------------------Check user login details-----------------------------------
    public function checkLogin(Request $request){
        $email          = $request->input('email');
        $password       = $request->input('password');
        $user           = User::where('email','=',$email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                auth()->attempt(['email' => $email, 'password' => $password]);
                Auth::loginUsingId($user->id);
                $accessToken = auth()->user()->createToken('authToken')->accessToken;
                return response()->json(['http_status' => 'ok','validate'=>'success', 'data'=>$user , 'depend_dpd_id'=>$user->depend_dpd_id, 'access_token' => $accessToken], 200);
            }else{
                return response()->json(['http_status' => 'error','validate'=>'invalid_password'],200);
            }
        } else {
            return response()->json(['http_status' => 'error','validate'=>'invalid_email'],200);
        }
    }
}
