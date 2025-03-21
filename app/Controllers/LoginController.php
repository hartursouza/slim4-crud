<?php

namespace App\Controllers;

use App\Classes\Flash;
use App\Classes\Login;
use App\Classes\Validate;
use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController extends Controller {

    private $validate;
    private $login;

    public function __construct() {
        $this->validate = new Validate;
        $this->login = new Login;
        parent::__construct('login');
    }

    public function index(Request $request, Response $response, array $args = []): Response
    { 
        $messages = Flash::getAll();

        // if logged in, redirect to the home page
        if($_SESSION['is_logged_in']){
            return redirect($response, '/');
        }

        // return view login
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

        $logged = $this->login->login($email, $password);

        if ($logged) {
            return redirect($response, '/');
        }

        Flash::set('message', 'Ocorreu um erro ao logar', 'danger');
        return redirect($response, '/login');
    }

    public function loggout(Request $request, Response $response)
    {
        $this->login->logout();
        return redirect($response, '/login');
    }
}