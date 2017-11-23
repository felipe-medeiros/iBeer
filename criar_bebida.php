<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

use Gps\Bebida;

$bebida = new Bebida;
$bebida->setNome('Cerveja');
$bebida->setMarca('Budweiser');
$bebida->setPreco(6.0)
$bebida->setMl(250)

$entityManager->persist($bebida);
$entityManager->flush();

echo 'Criada bebida com ID ' . $bebida->getId() . PHP_EOL;
