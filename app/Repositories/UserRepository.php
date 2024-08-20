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
       // dd($data);
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

    /**
     * Retorna todos os usuários
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsers()
    {
        return $this->model->all();
    }

    /**
     * Envia o link de redefinição de senha para o email fornecido
     *
     * @param array $credentials
     * @return string
     */
    public function sendResetLink(array $credentials): string
    {
        return Password::sendResetLink($credentials);
    }

    /**
     * Redefine a senha do usuário
     *
     * @param array $credentials
     * @param callable $callback
     * @return string
     */
    public function resetPassword(array $credentials, callable $callback): string
    {
        return Password::reset($credentials, $callback);
    }

}
