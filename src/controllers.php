<?php

use \Symfony\Component\HttpFoundation\Request;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
})->bind('index');

$app->get('/cadastro', function () use ($app) {
    return $app['twig']->render('cadastro.html.twig');
})->bind('cadastro-form');

$app->post('/cadastro/fornecedor', function (Request $request) use ($app) {
    try {
        $cnpj = $request->get('cnpj');
        $nome = $request->get('nome');
        $fornecedor = new \Gps\Model\Fornecedor();
        $fornecedor->setCnpj($cnpj);
        $fornecedor->setNome($nome);
        $app['em']->persist($fornecedor);
        $app['em']->flush();
        return $app->redirect($app["url_generator"]->generate("index"));
    } catch (InvalidArgumentException $e) {
        $app['session']->getFlashBag()->add('error', $e->getMessage());
    } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
        $app['session']->getFlashBag()->add('error', 'Fornecedor já cadastro');
    } catch (Exception $e) {
        $app['session']->getFlashBag()->add('error', 'Oops, um erro ocorreu');
    }
    return $app->redirect($app["url_generator"]->generate("cadastro-form"));
})->bind('cadastro-fornecedor');

$app->post('/cadastro/usuario', function (Request $request) use ($app) {
    die('cadastro cliente');
})->bind('cadastro-usuario');


