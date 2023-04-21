<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\AuthRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {

        try {

            return $this->responseSuccess($this->repository->all(request()->all()), "user get successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }

    public function register(Request $request)
    {

        try {
            $data = $this->repository->register($request->all());
            return $this->responseSuccess($data, "User registered successfully.");
        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function delete(Request $request){
        try {
            $data = $this->repository->delete($request->all());
            return $this->responseSuccess($data, "User account deactivate successfully.");
        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }

    }

    public function show($id):JsonResponse
    {
        try {
            $data = $this->repository->getById($id);
            return $this->responseSuccess($data, "User get successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function loggedprofile()
    {
        try {
            $data = [];
            $user = Auth::guard()->user();

            switch ($user->role) {
                case "pharmacy":
                    $data = $user->load('pharmacyProfile');
                    break;
                case "patient":
                    $data = $user->load('patientProfile');
                    break;

                default:
                    $data = $user;
                    break;
            }
                // if($user->role == "pharmacy"){
                //     $data = $user->load('agentProviderServices')
                // }else{

                // }

             return $data;

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $data = $this->repository->update($request->all(), $id);
            return $this->responseSuccess($data, "User registered successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function logout():JsonResponse
    {
        try {
            Auth::guard()->user()->token()->revoke();
            Auth::guard()->user()->token()->delete();
            return $this->responseSuccess([],"User logout successfully");
        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

}
