<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface DBPreperableInterface
{

    public function preperableForDB(array $data):array;
}
