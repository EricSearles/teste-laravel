<?php

namespace App\Services;

use App\Repositories\EnderecoRepository;
use App\Models\User;

class EnderecoService
{
    protected $enderecoRepository;

    /**
     * @param EnderecoRepository $enderecoRepository
     */
    public function __construct(EnderecoRepository $enderecoRepository)
    {
        $this->enderecoRepository = $enderecoRepository;
    }

    /**
     * Cria um novo endereço
     *
     * @param User $user
     * @param array $data
     * @return Endereco
     */
    public function createEndereco(User $user, array $data)
    {
        $data['user_id'] = $user->id;
        return $this->enderecoRepository->create($data);
    }
}
