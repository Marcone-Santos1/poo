<?php

namespace Src\Modelo\Conta;

use DomainException;

class ContaCorrente extends Conta
{
    protected function percentualTarifa(): float
    {
        return 0.05;
    }

    public function tranferir(Conta $conta, float $valor): array
    {
        $this->validaValor($valor);

        if ($conta === $this) {
            throw new DomainException("Transferência inválida!");
        }

        return [$this->sacar($valor), $conta->depositar($valor)];
    }
}