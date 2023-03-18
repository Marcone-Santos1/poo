<?php

namespace src\Modelo\Conta;

use Src\Modelo\CPF;
use Src\Modelo\Endereco;
use Src\Modelo\Pessoa;

class Cliete extends Pessoa
{
    private Endereco $endereco;

    public function __construct(string $nome, CPF $cpf, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

}