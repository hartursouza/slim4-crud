<?php

namespace App\Controllers;

use App\Classes\Flash;
use App\Classes\Validate;
use App\Controllers\Controller;
use App\Database\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController extends Controller {

    private $validate;
    private $user;

    public function __construct() {
        $this->user = new User;
        $this->validate = new Validate;
        parent::__construct('login');
    }

    public function index(Request $request, Response $response, array $args = []): Response
    { 
        $messages = Flash::getAll();

        $view = $this->getTemplate('login', ['messages' => $messages]);
        $response->getBody()->write($view);
        
        return $response;
    }

    public function store(Request $request, Response $response)
    {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
    
        $this->validate->required(['email', 'password']);
        $erros = $this->validate->getErros();

        if($erros)
        {
            Flash::flashes($erros);
            return redirect($response, '/login');
        }

      /*   $user = $this->user->findBy('email', $email);

        if ($user && password_verify($password, $user->password)) {
            redirect($response, '/');
        } */

        return $response;
    }

}