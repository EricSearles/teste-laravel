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

    /**
     * Cria um novo usuário
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    /**
     * Busca um usuário pelo email
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

}
