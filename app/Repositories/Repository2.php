<?php

namespace App\Repositories;


use App\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Exception;

class Repository2 implements TestInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all(array $filterData): Paginator
    {
        $filter = $this->getFilterData($filterData);
        $query = $this->model::orderBy($filter['oderBy'], $filter['oder']);

        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('provided_services', 'like', $searched)
                    ->orWhere('services_description', 'like', $searched);
            });
        }
        return $query->paginate($filter['perPage']);
    }

    public function getFilterData(array $filterData)
    {
        $defultArgs = [
            'perPage' => 3,
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
        $record = $this->model->find($id);
        return $record->update($data);
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
}
