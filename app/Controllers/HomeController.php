<?php 

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function __construct() {
        parent::__construct('home');
    }

    public function index(Request $request, Response $response, array $args = []): Response
    {   
        $name = $_SESSION['user_logged_data']['name'] ?? '';
        $email = $_SESSION['user_logged_data']['email'] ?? '';

        $view = $this->getTemplate('home', ['name' => $name]);
        $response->getBody()->write($view);
        
        return $response;
    }
}