<?php

namespace App\Controllers;

use App\Classes\Flash;
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

    public function index(Request $request, Response $response): Response
    {   
        $flash = Flash::get('message');
        $users = $this->user->findAll();
        $view = $this->getTemplate('users', ['users' => $users, 'message' => $flash]);
        $response->getBody()->write($view);
        
        return $response;
    }
    
    public function create(Request $request, Response $response)
    {
        $view = $this->getTemplate('create', []);
        $response->getBody()->write($view);

        return $response;
    }

    public function store(Request $request, Response $response)
    {
        var_dump('store');
        return $response;  
        // Flash::set('message', 'teste');
        //return redirect($response, '/users');
    }

    public function updateForm(Request $request, Response $response)
    {
        $view = $this->getTemplate('update', []);
        $response->getBody()->write($view);

        return $response;
    }

    public function update(Request $request, Response $response)
    {
        var_dump('update');
        return $response;  
    }

    public function delete(Request $request, Response $response)
    {
        $view = $this->getTemplate('delete', []);
        $response->getBody()->write($view);

        return $response;
    }

    public function destroy(Request $request, Response $response)
    {
        var_dump('delete');
        return $response;  
    }
}