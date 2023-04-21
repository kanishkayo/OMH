<?php

namespace App\Http\Controllers;

use App\Repositories\LecoCustomerRepository;
use App\Traits\ResponseTrait;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LecoCustomerController extends Controller
{
    use ResponseTrait;
    protected $repository;

    public function __construct(LecoCustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function existingCustomerDetails($accountnumber, $lat, $lng)
    {

        try {
            // $client = new Client([
            //     // Base URI is used with relative requests
            //     'base_uri' => 'http://example.com/api/',
            //     // You can set any number of default request options.
            //     'timeout'  => 2.0,
            // ]);

            // $response = $client->request('GET', 'endpoint');
            // $data = json_decode($response->getBody(), true);
            $data =[];
            return $this->responseSuccess(
                $this->repository->prepareExistingCustomerDetails($data, $accountnumber, $lat, $lng),
                "Existing customer details."
            );
        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage(), $exception->getCode());
        }
    }

    public function requestingServices(Request $request)
    {
        try {

            return $this->responseSuccess(
                $this->repository->insertDBRequestedServices($request->all()),
                "Services inserted."
            );

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage(), 500);
        }
    }

    public function historyOfServices(Request $request, $accountNumber)
    {
        try {

            return $this->responseSuccess(
                $this->repository->getHistoryOfServices($request->all(), $accountNumber),
                "Services inserted."
            );

        } catch (Exception $exception) {
            return $this->responseErrors($exception, $exception->getMessage(), 404);
        }
    }

}
