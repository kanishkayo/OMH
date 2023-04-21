<?php

namespace App\Repositories;

use App\CustomerRequestedJobDetails;
use App\CustomerRequestedJobList;
use App\Http\Requests\LoginRequest;
use App\Interfaces\AgentInterface;
use App\Interfaces\DBPreperableInterface;
use App\Interfaces\UserInterface;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;

class AgentRepository implements AgentInterface
{
    protected $model;

    public function __construct(CustomerRequestedJobDetails $model)
    {
        $this->model = $model;
    }

    public function all(array $filterData, $id): Paginator
    {
        $filter = $this->getFilterData($filterData);
        $query = $this->model::with('jobList')->orderBy($filter['oderBy'], $filter['oder']);


        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('services_schedule_date', 'like', $searched)
                    ->orWhere('services_re_schedule_date', 'like', $searched)
                    ->orWhere('job_status', 'like', $searched);
            });
        }

        return $query->where('agent_id', "=", $id)->paginate($filter['perPage']);
    }

    public function getFilterData(array $filterData)
    {
        $defultArgs = [
            'perPage' => 10,
            'search' => '',
            'oderBy' => 'id',
            'oder' => 'desc'
        ];

        return array_merge($defultArgs, $filterData);
    }


}
