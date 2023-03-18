<?php

use src\Cliete;
use src\Conta;

require_once 'src/Conta.php';
require_once 'src/Cliete.php';

$cliente = new Cliete('Marcone Santos', '44547321833');
$cliente2 = new Cliete('Marcone Santos', '99999999999');

$cpf = new Conta($cliente, 400);
$cpf2 = new Conta($cliente2, 400);

$cpf->sacar(200);
$cpf->sacar(100);
$cpf->sacar(100);

$cpf2->depositar(1000);

$cpf->depositar(1000);
$cpf->depositar(1000);

$cpf->tranferir($cpf2, 100);
$cpf2->tranferir($cpf, 1500);


var_dump($cliente->getCpf(), $cpf->getSaldo());
echo PHP_EOL;
var_dump($cliente2->getCpf(), $cpf2->getSaldo());

echo PHP_EOL;
echo Conta::getNumeroContas();
