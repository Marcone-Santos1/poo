<?php

namespace Src;

use DomainException;
use ValueError;

class Conta
{

    private float $saldo;
    private static int $numeroDeConta = 0;
    private Cliete $cliente;

    public function __construct(Cliete $cliete, float $saldo)
    {
        $this->cliente = $cliete;
        $this->saldo = $saldo;
        self::$numeroDeConta++;
    }

    public function __destruct()
    {
        self::$numeroDeConta--;
    }

    public function sacar(float $valor): float
    {
        $this->validaValor($valor);
        return $this->saldo -= $valor;
    }

    public function depositar(float $valor): float
    {
        if ($valor <= 0) {
            throw new ValueError('Valor inválido!');
        }
        return $this->saldo += $valor;
    }

    public function tranferir(Conta $conta, float $valor): array
    {
        $this->validaValor($valor);

        if ($conta === $this) {
            throw new DomainException("Transferência inválida!");
        }

        return [$this->sacar($valor), $conta->depositar($valor)];
    }

    private function validaValor(float $valor): void
    {
        if ($valor > $this->saldo || $valor <= 0) {
            throw new ValueError('Valor inválido!');
        }
    }
    public static function getNumeroContas(): int
    {
        return self::$numeroDeConta;
    }
    public function getSaldo(): float
    {
        return $this->saldo;

    }
}