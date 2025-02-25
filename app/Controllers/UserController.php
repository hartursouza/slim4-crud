<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends Controller
{
    public function index(Request $request, Response $response, array $args = [])
    {
        $view = $this->getTemplates()->render('users');
        $response->getBody()->write($view);
        
        return $response;
    }
}