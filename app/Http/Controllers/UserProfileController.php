<?php

namespace App\Http\Controllers;

use App\Interfaces\UserProfileInterface;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(UserProfileInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            return $this->responseSuccess($this->repository->all(request()->all()), "User Profile get successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            return $this->responseSuccess($this->repository->show($id), "User Profile get successfully");

        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        try {
            $data = $this->repository->create($request->all());
            return $this->responseSuccess($data, "user created successfully");
        } catch (Exception $e) {

            return $this->responseErrors($e, $e->getMessage(), $e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


}
