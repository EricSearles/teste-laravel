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

    /**
     * Envia o link de redefinição de senha para o email fornecido
     *
     * @param string $email
     * @return string
     */
    public function sendPasswordResetLink(string $email): string
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            return Password::INVALID_USER;
        }

        return $this->userRepository->sendResetLink(['email' => $email]);
    }

    /**
     * Redefine a senha do usuário
     *
     * @param array $data
     * @return string
     */
    public function resetPassword(array $data): string
    {
        return $this->userRepository->resetPassword($data, function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        });
    }

}
