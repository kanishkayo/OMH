<?php

namespace App\Repositories;

use App\CustomerRequestedJobDetails;
use App\CustomerRequestedJobList;
use App\Http\Requests\LoginRequest;
use App\Interfaces\DBPreperableInterface;
use App\Interfaces\UserInterface;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;

class LecoCustomerRepository
{
    protected $model;

    public function __construct(CustomerRequestedJobDetails $model)
    {
        $this->model = $model;
    }

    public function prepareExistingCustomerDetails($data, $accountnumber, $lat, $lng)
    {
        $defultCustomerData = [

            'customer_account_number' => $accountnumber,
            'customer_name' => 'Customer_a',
            'customer_contact_number' => '0764252252',
            'customer_address' => 'Colombo',
            'customer_lat' => '6.9271',
            'customer_lng' => '79.8612',
            'customer_current_lat' => $lat,
            'customer_current_lng' => $lng,

        ];

        return array_merge($defultCustomerData, $data);
    }
    public function insertDBRequestedServices(array $data)
    {
        $services = $this->model::create($data['serviceDetails']);
        if (!$services) {

            throw new Exception("Sorry, Services request does not registered, please try again.", 500);
        }
        $existingServices = $this->model::find($services->id);

        if (isset($data['serviceList'])) {
            $serviceList = collect($data['serviceList'])->map(function ($serviceList) {
                return new CustomerRequestedJobList($serviceList);
            });

            $existingServices->jobList()->saveMany($serviceList);
        }

        return $this->model::with('jobList')->find($services->id);
    }


    public function getHistoryOfServices(array $filterData, $accountNumber)
    {
        $filter = $this->getFilterData($filterData);
        $query = $this->model::orderBy($filter['oderBy'], $filter['oder']);

        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('job_status', 'like', $searched);
            });
        }
        return $query->where('customer_account_number', '=', $accountNumber)->get();
    }

    public function getFilterData(array $filterData)
    {
        $defultArgs = [
            'search' => '',
            'oderBy' => 'id',
            'oder' => 'desc'
        ];

        return array_merge($defultArgs, $filterData);
    }

    public function prepareJobDetailDataForInsert(array $data)
    {
        return [
            'customer_account_number' => $data['customer_account_number'],
            'customer_name' => $data['customer_name'],
            'customer_contact_number' => $data['customer_contact_number'],
            'customer_address' => $data['customer_address'],
            'customer_lat' => $data['customer_lat'],
            'customer_lng' => $data['customer_lng'],
            'services_provider_lat' => $data['services_provider_lat'],
            'services_provider_lng' => $data['services_provider_lng'],
            'services_schedule_date' => $data['services_schedule_date'],
            'services_schedule_time' => $data['services_schedule_time'],
            'services_re_schedule_date' => $data['services_re_schedule_date'],
            'services_re_schedule_time' => $data['services_re_schedule_time'],
            'total_services_charge' => $data['total_services_charge'],
            'net_total_services_chage' => $data['net_total_services_chage'],
            'agent_id' => $data['agent_id'],
            'job_status' => $data['job_status'],

        ];
    }

    public function prepareJobListDataForInsert(array $data)
    {
        return [
            'service_name' => $data['service_name'],
            'service_id' => $data['service_id'],
            'service_charge' => $data['service_charge'],
            'service_status' => $data['service_status'],
        ];
    }
}
