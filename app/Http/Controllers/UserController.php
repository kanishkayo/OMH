<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    //----------------------------User Login-------------------------------------------------------------------------
    public function login(LoginRequest $request)
    {

        try {
            $data = $this->repository->login($request->all());
            return $this->responseSuccess($data, "logged in successfully.");
        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }


    public function checkTokenValidity(Request $request)
    {
        return response()->json(['http_status' => 'success'], 200);
    }
}
