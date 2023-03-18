<?php

use Src\{Cliete, Conta, CPF, Endereco};

require_once "vendor/autoload.php";

$endereco = new Endereco('São Paulo', 'Pq. Independência', 'José Ribeiro Ramos', '28');

$cpfCliente = new CPF('445.473.218-39');

$cliente = new Cliete('Marcone Santos', $cpfCliente, $endereco);
$cliente2 = new Cliete('Marcone Santos', $cpfCliente, $endereco);

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


var_dump($cliente->getTitular(), $cliente->getCpf()->recuperaNumero(), $cpf->getSaldo(), $cliente->getEndereco()->getRua());
echo PHP_EOL;
var_dump($cliente2->getTitular(), $cliente->getCpf()->recuperaNumero(), $cpf2->getSaldo(), $cliente2->getEndereco()->getRua());

echo PHP_EOL;
echo Conta::getNumeroContas();
