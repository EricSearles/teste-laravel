<?php

namespace App\Repositories;

use App\Models\Registration;

class RegistrationRepository
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Registration $model)
    {
        $this->model = $model;
    }

}
