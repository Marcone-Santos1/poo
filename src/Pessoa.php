<?php

namespace Src;

abstract class Pessoa
{

    private CPF $cpf;
    protected string $nome;

    public function __construct(string $nome, CPF $cpf)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getTitular(): string
    {
        return $this->nome;
    }

    public function getCpf(): CPF
    {
        return $this->cpf;
    }
}