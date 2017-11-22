<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

use Gps\Fornecedor;

$fornecedores = $entityManager->getRepository('Gps\Fornecedor')->findAll();

foreach ($fornecedores as $fornecedor) {
    echo $fornecedor->getNome() . '  ' . $fornecedor->getCnpj() . PHP_EOL;
}
