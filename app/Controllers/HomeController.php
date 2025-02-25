<?php 

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, array $args = []): Response
    { 
        var_dump($response->getStatusCode());
        $view = $this->getTemplates()->render('home');
        $response->getBody()->write($view);
        
        return $response;
    }
}