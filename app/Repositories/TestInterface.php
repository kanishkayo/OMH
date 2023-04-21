<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\Paginator;

interface TestInterface
{
    public function all(array $filterData):Paginator;
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function show($id);
}
