<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface CrudInterface
{

    public function all():Paginator;
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function show($id);
}
