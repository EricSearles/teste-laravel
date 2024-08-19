<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

}
