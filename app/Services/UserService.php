<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Cria um novo usuário
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    /**
     * Retorna todos os usuários cadastrados
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }
}
