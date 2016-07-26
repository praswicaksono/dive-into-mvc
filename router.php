<?php

require_once 'Controllers/ArticleController.php';
require_once 'Controllers/HelloWorldController.php';

$articleController = new ArticleController();
$helloWorldController = new HelloWorldController();

$routesMap = [
    '/article' => $articleController,
    '/hello-world' => $helloWorldController,
];

if (! array_key_exists($_SERVER['REQUEST_URI'], $routesMap)) {
    http_response_code(404);
    echo 'Not Found Page';
    die();
}

$matchedController = $routesMap[$_SERVER['REQUEST_URI']];

echo $matchedController();
