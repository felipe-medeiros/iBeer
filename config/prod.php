<?php

$app->register(new \Silex\Provider\CsrfServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../templates',
));

$app['em'] = $entityManager;

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\AssetServiceProvider());
