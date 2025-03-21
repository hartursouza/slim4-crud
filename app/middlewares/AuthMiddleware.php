<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

$authMiddleware = function (Request $request, RequestHandler $handler) {

    if (!isset($_SESSION['is_logged_in'])) {
        $response = new Response();
        return redirect($response, '/login');
    }

    // Proceed with the next middleware
    return $handler->handle($request);
};