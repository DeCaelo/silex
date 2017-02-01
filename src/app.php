<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->match('/', function (Request $request) {
    return new Response(getContent($request->query->all()));
});

function getContent($parameters) {
    $name = isset($parameters['name']) ? $parameters['name'] : 'Christophe';

    return sprintf('Bonjour %s.', $name);
}

$app->run();