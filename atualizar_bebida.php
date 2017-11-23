<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

use Gps\Bebida;

$id = 1;

$bebida = $entityManager->getRepository('Gps\Bebida')->find($id);

if ($bebida == NULL) {
    echo 'Bebida com ID ' .  $id . ' não encontrada' . PHP_EOL;
} else {
    $bebida->setPreco(7.5);
    $entityManager->merge($bebida);
    $entityManager->flush();

    echo 'Atualizada bebida com ID ' . $bebida->getId() . PHP_EOL;
}
