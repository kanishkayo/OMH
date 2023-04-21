<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface ServicesInterface
{
    public function all(array $filterData);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function show($id);
}
