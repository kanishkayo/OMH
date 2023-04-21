<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\TestRepository;

class PostRepository implements RepositoryInterface {
    public function getAll() {
      return TestRepository::all();
    }
  }
