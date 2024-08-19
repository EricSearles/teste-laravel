<?php

namespace App\Services;

use App\Services\RegistrationRepository;

class RegistrationService
{

    private $repository;

    public function __construct(RegistrationRepository $repository)
    {
        $this->repository = $repository;
    }
}
