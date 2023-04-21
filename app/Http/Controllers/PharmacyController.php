<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\AuthRepository;
use App\Repositories\PharmacyRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(PharmacyRepository $repository)
    {
        $this->repository = $repository;
    }





    public function all(Request $request)
    {
        try {
            $data = $this->repository->all($request->all());
            return $this->responseSuccess($data, "Get All Pharmacy successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function getOderList(Request $request)
    {
        try {
            $data = $this->repository->getOderList($request->all());
            return $this->responseSuccess($data, "Get All Order successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function searchPharmacyStock(Request $request)
    {
        try {
            $data = $this->repository->searchPharmacyStock($request->all());
            return $this->responseSuccess($data, "Get All Stock successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function inventoryItemDelete(Request $request)
    {
        try {
            $data = $this->repository->inventoryItemDelete($request->all());
            return $this->responseSuccess($data, "Delete Item successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function getItemName(Request $request)
    {
        try {
            $data = $this->repository->getItemName($request->all());
            return $this->responseSuccess($data, "get Item successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }


    public function getInvoice(Request $request)
    {
        try {
            $data = $this->repository->getInvoice($request->all());
            return $this->responseSuccess($data, "invoice details.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }
    public function getOrderList(Request $request)
    {
        try {
            $data = $this->repository->getOrderList($request->all());
            return $this->responseSuccess($data, "Order List");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function orderComleted(Request $request)
    {
        try {
            $data = $this->repository->orderComleted($request->all());
            return $this->responseSuccess($data, "Order Completed");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function addPharmacyInventory(Request $request)
    {
        try {
            $data = $this->repository->addPharmacyInventory($request->all());
            return $this->responseSuccess($data, "Item added");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }





    public function submittedPayment(Request $request)
    {
        try {
            $data = $this->repository->submittedPayment($request->all());
            return $this->responseSuccess($data, "invoice details.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }






    public function getNearPharmacy(Request $request)
    {
        try {
            $data = $this->repository->getNearPharmacy($request->all());
            return $this->responseSuccess($data, "Get Near Pharmacy successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }

    public function orderRequest(Request $request)
    {
        try {
            $data = $this->repository->orderRequest($request->all());
            return $this->responseSuccess($data, "order requesting successfully.");

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage());
        }
    }





}
