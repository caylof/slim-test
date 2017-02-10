<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->addPsr4('app\\', __DIR__.'/../app');

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\ctrls\CategoryCtrl;


$config['displayErrorDetails'] = true;

$app = new \Slim\App(["settings" => $config]);

$app->group('/cate', function () {
    $this->get('',         CategoryCtrl::className().':getAllAction');
    $this->get('/{id}',    CategoryCtrl::className().':getOneAction');
    $this->post('',        CategoryCtrl::className().':addAction');
    $this->put('/{id}',    CategoryCtrl::className().':updateAction');
    $this->delete('/{id}', CategoryCtrl::className().':delAction');
});


$app->get('/product', function (Request $request, Response $response, $args) {
    $data = include __DIR__.'/../data-test/product.php';
    $response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson(['msg' => 'suceess', 'data' => $data]);
    return $response;
});


$app->run();
