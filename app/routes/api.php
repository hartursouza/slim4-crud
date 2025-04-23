<?php

use App\Controllers\UserController;
use App\Middlewares\AuthMiddleware;
use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group) {
    $group->get('/users',function($request, $response){
        $payload = json_encode(['name' => 'Hartur']);
        $response->getBody()->write($payload);

        return $response->withHeader('Content-type', 'application/json', 200);
    });
});