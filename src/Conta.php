<?php

namespace src;

use DomainException;
use ValueError;

class Conta
{
    private string $cpf;
    private string $titular;
    private float $saldo;

    public function __construct(string $cpf, string $titular, float $saldo)
    {
        $this->cpf = $cpf;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function sacar(float $valor): float
    {
        $this->validaValor($valor);
        return $this->saldo -= $valor;
    }

    public function depositar(float $valor): float
    {
        if ($valor <= 0)
        {
            throw new ValueError('Valor inválido!');
        }
        return $this->saldo += $valor;
    }

    public function tranferir(Conta $conta, float $valor): array
    {
        $this->validaValor($valor);

        if ($conta === $this)
        {
            throw new DomainException("Transferência inválida!");
        }

        return [$this->sacar($valor), $conta->depositar($valor)];
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }
    public function getSaldo(): float
    {
        return $this->saldo;

    }public function getTitular(): string
    {
        return $this->titular;
    }

    /**
     * @param float $valor
     * @return void
     */
    private function validaValor(float $valor): void
    {
        if ($valor > $this->saldo || $valor <= 0) {
            throw new ValueError('Valor inválido!');
        }
    }

}