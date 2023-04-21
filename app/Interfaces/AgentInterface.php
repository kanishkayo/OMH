<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface AgentInterface
{

    public function all(array $filterData, $id):Paginator;



}
