<?php

namespace App\Http\Controllers\example;

use App\Http\Controllers\Controller;
use App\Repositories\TestInterface;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ExampleController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(TestInterface $repository)
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

    public function update(Request $request, $id)
    {
        try {

            return $this->responseSuccess(
                $this->repository->update($request->all(), $id),
                "product updated successfully"
            );

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), 404);
        }
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        try {

            return $this->responseSuccess($this->repository->show($id), "product get successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }

    }
}
