<?php

namespace App\Repositories;

use App\Models\Endereco;

class EnderecoRepository
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Endereco $model)
    {
        $this->model = $model;
    }

    /**
     * Cria um novo endereço
     *
     * @param array $data
     * @return Endereco
     */
    public function create(array $data): Endereco
    {
        return $this->model->create($data);
    }
}
