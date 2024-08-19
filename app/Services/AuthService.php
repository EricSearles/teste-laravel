<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepository;

    /**
     * Construtor
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Tenta autenticar o usuário e retorna um booleano de sucesso
     *
     * @param array $credentials
     * @return bool
     */
    public function attemptLogin(array $credentials): bool
    {
        $user = $this->userRepository->findByEmail($credentials['email']);

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return true;
        }

        return false;
    }

    /**
     * Desloga o usuário
     */
    public function logout()
    {
        Auth::logout();
    }
}

