<?php

namespace App\Repositories;

use App\Interfaces\ServicesInterface;
use App\InventoryItems;
use App\PatientOrder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Exception;

class ServicesRepository implements ServicesInterface
{
    protected $model;

    public function __construct(InventoryItems $model)
    {
        $this->model = $model;
    }

    public function all(array $filterData)
    {
        $filter = $this->getFilterData($filterData);
        $query = $this->model::orderBy($filter['oderBy'], $filter['oder']);

        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('sub_category', 'like', $searched)
                    ->orWhere('item_name', 'like', $searched);
            });
        }
        return $query->get();
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

    public function create(array $data)
    {

        //Unique Slug generation.

        //Image upload.

        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record=$this->getById($id);

        if (!$record->update($this->prepareDataForRegister($data))) {

            throw new Exception("Sorry, services does not updated, please try again.", 500);
        }

        return $record=$this->getById($id);

    }

    public function delete($id)
    {


        return $this->model->destroy($id);
    }

    public function show($id)
    {
        $data = $this->model->find($id);
        if (empty($data)) {

            throw new Exception("product does not exist", Response::HTTP_NOT_FOUND);

        }

        return $data;
    }

    public function prepareDataForRegister(array $data)
    {
        return [

            'provided_services' => $data['provided_services'],
            'services_description' => $data['services_description'],
            'status' => $data['status'],

        ];
    }

    public function getById($id)
    {
        $data = $this->model->find($id);
        if (empty($data)) {

            throw new Exception("user does not exist", Response::HTTP_NOT_FOUND);

        }

        return $data;
    }

    public function previousOrder(array $filterData, $id){

        $filter = $this->getFilterData($filterData);
        $query = PatientOrder::with('pharmacy')->orderBy($filter['oderBy'], $filter['oder']);


        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('oder_status', 'like', $searched)
                    ->orWhere('created_at', 'like', $searched);
            });
        }

        return $query->where('patient_id', "=", $id)->get();
    }


}
