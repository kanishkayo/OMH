<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRegisterRequest;
use App\PharmacyStock;
use App\Repositories\ServicesRepository;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): JsonResponse
    {

        try {

            return $this->responseSuccess($this->repository->all(request()->all()), "product get successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }

    public function store(Request $request)
    {

        try {

            return $this->responseSuccess($this->repository->create($request->all()), "product created successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }


    }


    public function getpharmacystock($id)
    {
        $data = PharmacyStock::where('pharmacy_id', '=', $id)->get();

        try {

            return $this->responseSuccess($data, "product get successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }

    public function show($id)
    {
        try {

            return $this->responseSuccess($this->repository->show($id), "product get successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }

    }

    public function update(ServicesRegisterRequest $request, $id)
    {
        try {

            return $this->responseSuccess(
                $this->repository->update($request->all(), $id),
                "product updated successfully"
            );

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('users.index');
    }
    public function previousOrder(Request $request, $id)
    {


        try {

            return $this->responseSuccess(
                $this->repository->previousOrder($request->all(), $id),
                "User History get successfully"
            );

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }

    }


}
