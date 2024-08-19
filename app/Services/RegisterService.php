<?php

namespace App\Services;

use App\Repositories\RegisterRepository;

class RegisterService
{
    private $repository;

    public function __construct(RegisterRepository $repository)
    {
        $this->repository = $repository;
    }
}
