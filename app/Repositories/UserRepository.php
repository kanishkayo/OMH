<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\User;

class UserRepository implements RepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }
}
