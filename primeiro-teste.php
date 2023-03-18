<?php

use src\Conta;

require_once 'src/Conta.php';

$cpf = new Conta('44547321833', 'Marcone Santos', 400);
$cpf2 = new Conta('44547321831', 'Marcone Santos', 400);

$cpf->sacar(200);
$cpf->sacar(100);
$cpf->sacar(100);

$cpf2->depositar(1000);
$cpf->depositar(1000);
$cpf->depositar(1000);

$cpf->tranferir($cpf2, 100);
$cpf2->tranferir($cpf, 500);


var_dump($cpf->getCpf(), $cpf->getSaldo());
echo PHP_EOL;
var_dump($cpf2->getCpf(), $cpf2->getSaldo());
