<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

use Gps\Fornecedor;

$fornecedor = new Fornecedor();
$fornecedor->setNome('JT Bebidas');
$fornecedor->setCnpj('57311943000152');

$entityManager->persist($fornecedor);
$entityManager->flush();

echo 'Criado fornecedor com ID ' . $fornecedor->getId() . PHP_EOL;
