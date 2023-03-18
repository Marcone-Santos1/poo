<?php

namespace src;

class Cliete
{
    private string $cpf;
    private string $titular;

    public function __construct(string $titular, string $cpf)
    {
        $this->titular = $titular;
        $this->cpf = $cpf;
    }
    public function getTitular(): string
    {
        return $this->titular;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
}