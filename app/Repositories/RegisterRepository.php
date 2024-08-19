<?php

namespace App\Repositories;

use App\Models\Register;

class RegisterRepository
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Register $model)
    {
        $this->model = $model;
    }
}
