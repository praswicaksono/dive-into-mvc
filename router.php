<?php

require_once 'Persistence/FilePersistence.php';
require_once 'Controllers/ArticleController.php';
require_once 'Controllers/HelloWorldController.php';
require_once 'Controllers/CreateArticleController.php';

$articleController = new ArticleController();
$helloWorldController = new HelloWorldController();
$createArticleController = new CreateArticleController(new FilePersistence());

$routesMap = [
    'GET' => [
        '/article' => $articleController,
        '/hello-world' => $helloWorldController,
    ],
    'POST' => [
        '/article' => $createArticleController
    ]
];

$routes = $routesMap[$_SERVER['REQUEST_METHOD']];

if (! array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    http_response_code(404);
    echo 'Not Found Page';
    die();
}

$matchedController = $routes[$_SERVER['REQUEST_URI']];

echo $matchedController();
