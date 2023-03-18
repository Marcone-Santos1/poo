<?php

namespace Src\Modelo\Conta;

use DomainException;
use ValueError;

abstract class Conta
{
    protected float $saldo;
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
        $tarifaSaque = $valor * $this->percentualTarifa();

        $valorSaque = $valor + $tarifaSaque;

        $this->validaValor($valorSaque);

        return $this->saldo -= $valorSaque;
    }

    public function depositar(float $valor): float
    {
        if ($valor <= 0) {
            throw new ValueError('Valor inválido!');
        }
        return $this->saldo += $valor;
    }

    protected function validaValor(float $valor): void
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
    /**
     * @return Cliete
     */
    public function getCliente(): Cliete
    {
        return $this->cliente;
    }

    abstract protected function percentualTarifa(): float;


}