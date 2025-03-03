<?php 

namespace App\Controllers;

use App\Database\Models\User;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function __construct() {
        parent::__construct('home');
    }

    public function index(Request $request, Response $response, array $args = []): Response
    { 
        $view = $this->getTemplate('home', []);
        $response->getBody()->write($view);
        
        return $response;
    }
}