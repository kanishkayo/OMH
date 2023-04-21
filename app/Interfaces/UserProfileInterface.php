<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface UserProfileInterface
{

    public function all(array $filterData):Paginator;
    public function show($id);
    public function create(array $data);
    public function update(array $data, $id);




}
