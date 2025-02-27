<?php

namespace App\Controllers;

use App\Database\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {   
        $this->user = new User; 
        parent::__construct('users');
    }

    public function index(Request $request, Response $response, array $args = []): Response
    {
        $users = $this->user->findAll();
        $view = $this->getTemplate('users', ['users' => $users]);
        $response->getBody()->write($view);
        
        return $response;
    }
}