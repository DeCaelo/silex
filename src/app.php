<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/services/Template.php';

$app = new Silex\Application();
$app['debug'] = true;

$app['service.template'] = function () {
    return new Template();
};

$app->get('/', function () use ($app) {
    return new Response($app['service.template']->getContent());
});

$app->post('/submit', function (Request $request) use ($app) {
    return new Response($app['service.template']->postContent($request->request));
});

$app->run();