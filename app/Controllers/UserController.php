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
        if(!$_SESSION['is_logged_in']){
            return redirect($response, '/login');
        }

        $users = $this->user->findAll();
        $messages = Flash::getAll();

        $view = $this->getTemplate('users', ['users' => $users, 'messages' => $messages]);
        $response->getBody()->write($view);
        
        return $response;
    }
    
    public function create(Request $request, Response $response)
    {
        if(!$_SESSION['is_logged_in']){
            return redirect($response, '/login');
        }

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

        $created = $this->user->create(['name' => $name, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

        if($created)
        {
            return redirect($response, '/users');
        }

        return $response;  
    }

    public function edit(Request $request, Response $response, array $args)
    {
        if(!$_SESSION['is_logged_in']){
            return redirect($response, '/login');
        }

        $user = $this->user->findBy('id', strip_tags($args['id']));

        if(!$user)
        {
            Flash::set('message', 'Usuário não existe', 'danger');
            return redirect($response, '/users');
        }

        $view = $this->getTemplate('update', ['user' => $user]);
        $response->getBody()->write($view);

        return $response;
    }

    public function update(Request $request, Response $response, array $args)
    {   
        $id = $_POST['id'];

        $user = $this->user->findBy('id', $id);

        $name = !empty($_POST['name']) ? strip_tags($_POST['name']) : $user->name;
        $email = !empty($_POST['email']) ? strip_tags($_POST['email']) : $user->email;
        $password = !empty($_POST['password']) ? strip_tags($_POST['password']) : $user->password;
       
        $updated = $this->user->update(
            ['name' => $name, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)],
            ['id' => $id]);

        if($updated)
        {
            return redirect($response, '/users');
        }
        
        return $response;  
    }

    public function destroy(Request $request, Response $response, array $args)
    {
        $id = strip_tags($args['id']);

        $user = $this->user->findBy('id', $id);

        if(!$user)
        {
            Flash::set('message', 'Usuário não existe', 'danger');
            return redirect($response, '/users');
        }

        $deleted = $this->user->delete('id', $id);

        if($deleted)
        {   
            Flash::set('message', 'Deletado com sucesso');
            return redirect($response, '/users');
        }

        Flash::set('message', 'Ocorreu um erro ao deletar', 'danger');
        return redirect($response, '/users');
    }
}