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

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));

$app->get('/', function () use ($app) {
    return $app['twig']->render('get.html.twig');
});

$app->post('/submit', function (Request $request) use ($app) {
    return $app['twig']->render('post.html.twig', $request->request->all());
});

$app->run();