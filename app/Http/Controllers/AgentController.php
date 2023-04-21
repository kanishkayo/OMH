<?php

namespace App\Http\Controllers;

use App\Repositories\AgentRepository;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(AgentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        try {

            return $this->responseSuccess(
                $this->repository->all($request->all(), $id),
                "User Profile get successfully"
            );

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }

    public function updateServicesStatus(Request $request)
    {
        try {

            return $this->responseSuccess(
                $this->repository->all($request->all()),
                "User Profile get successfully"
            );

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }
}
