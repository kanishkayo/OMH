<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRegisterRequest;
use App\PharmacyStock;
use App\Repositories\ServicesRepository;
use App\Traits\ResponseTrait;
use App\InventoryItems;
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

    public function update(Request $request)
    {
        $item_id = $request->item_id;
        $sub_category = $request->sub_category;
        $item_name = $request->item_name;

        try {
            $itenventory_item = InventoryItems::find($item_id);
            $itenventory_item->sub_category = $sub_category;
            $itenventory_item->item_name = $item_name;
            $itenventory_item->update();
            return response()->json(['message'=>'Record Updated Suceesfully']);

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }




        // try {

        //     return $this->responseSuccess(
        //         $this->repository->update($request->all(), $id),
        //         "product updated successfully"
        //     );

        // } catch (Exception $e) {

        //     return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        // }
    }

    public function destroy($id)
    {
        InventoryItems::where('id', $id)->delete();
        return response()->json(['message'=>'Record Deleted Suceesfully']);
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