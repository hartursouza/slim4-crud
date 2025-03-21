<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        if (!isset($_SESSION['is_logged_in'])) {
            $response = new Response();
            return redirect($response, '/login');
        }

        // Invoke the next middleware and return response
        return $handler->handle($request);
    }
}