<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

use Gps\Fornecedor;

$id = 1;

$fornecedor = $entityManager->getRepository('Gps\Fornecedor')->find($id);

if (NULL == $fornecedor) {
    echo 'Fornecedor com ID ' .  $id . ' não encontrado' . PHP_EOL;
} else {
    $fornecedor->setNome('MOJO Bebidas');
    $entityManager->merge($fornecedor);
    $entityManager->flush();

    echo 'Atualizado fornecedor com ID ' . $fornecedor->getId() . PHP_EOL;
}
