<?php

namespace App\Repositories;

use App\Interfaces\UserProfileInterface;
use App\User;
use App\UserProfile;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Exception;

class UserProfileRepository implements UserProfileInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all(array $filterData): Paginator
    {
        $filter = $this->getFilterData($filterData);
        $query = $this->model::with('profile')->orderBy($filter['oderBy'], $filter['oder']);


        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('email', 'like', $searched)
                    ->orWhere('role', 'like', $searched);
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>$data['password'],
            'role' => $data['role'],
            'section' => $data['section'],
            'province' => $data['province'],
            'district' => $data['district'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'status' => $data['status'],
            'mobile' => $data['mobile'],
        ]);

        $userProfile = UserProfile::create([
            'full_name' => $data['full_name'],
            'gender' => $data['gender'],
            'nic' => $data['nic'],
            'phone_number' => $data['phone_number'],
            'other_phone_number' => $data['other_phone_number'],
            'experience' => $data['experience'],
            'street_address' => $data['street_address'],
            'city' => $data['city'],
            'google_address' => $data['google_address'],
            'qualifications_description' => $data['qualifications_description'],

        ]);

        $user->roles()->attach($userProfile->id);
    }


    public function update(array $data, $id)
    {
        $record = $this->model->where('user_id', $id)->first();

        if (empty($record)) {

            throw new Exception("user profile does not exist", Response::HTTP_NOT_FOUND);
        }

        return $record->update($data);
    }



    public function show($id)
    {
        $data = $this->model->with('profile')->where('id', $id)->first();

        if (empty($data)) {

            throw new Exception("user profile does not exist", Response::HTTP_NOT_FOUND);
        }

        return $data;
    }
}
