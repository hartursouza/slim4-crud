<?php

namespace App\Controllers;

use App\Classes\Flash;
use App\Classes\Validate;
use App\Database\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends Controller
{
    private $user;
    private $validate;

    public function __construct()
    {   
        $this->user = new User;
        $this->validate = new Validate;
        parent::__construct('users');
    }

    public function index(Request $request, Response $response): Response
    {   
        $users = $this->user->findAll();

        $view = $this->getTemplate('users', ['users' => $users]);
        $response->withStatus(200)->getBody()->write($view);
        
        return $response;
    }
    
    public function create(Request $request, Response $response)
    {
        $messages = Flash::getAll();

        $view = $this->getTemplate('create', ['messages' => $messages]);
        $response->getBody()->write($view);

        return $response;
    }

    public function store(Request $request, Response $response)
    {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
    
        $this->validate->required(['name', 'email', 'password'])->exist($this->user, 'email', $email);
        $erros = $this->validate->getErros();

        if($erros)
        {
            Flash::flashes($erros);
            return redirect($response, '/users/create');
        }

        $created = $this->user->create(['name' => $name, 'email' => $email, 'password' => password_hash($email, PASSWORD_DEFAULT)]);

        if($created)
        {
            return redirect($response, '/users');
        }

        return $response;  
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