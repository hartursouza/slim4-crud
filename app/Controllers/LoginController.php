<?php

namespace App\Controllers;

use App\Classes\Flash;
use App\Classes\Login;
use App\Classes\Validate;
use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Classe responsável pelo controle do fluxo de login, incluindo 
 * exibição do formulário, validação de credenciais e manipulação
 * da sessão do usuário.
 * 
 * @package App\Controllers
 */
class LoginController extends Controller {

    /**
     * @var Validate $validate Instância da classe de validação de dados
     */
    private $validate;

    /**
     * @var Login $login Instância da classe de login
     */
    private $login;

    /**
     * Construtor da classe LoginController. Inicializa as instâncias 
     * das classes necessárias para validação e autenticação do usuário.
     */
    public function __construct() {
        $this->validate = new Validate;
        $this->login = new Login;
        parent::__construct('login');
    }

    /**
     * Exibe o formulário de login para o usuário, incluindo mensagens
     * de erro, se houver.
     * 
     * @param Request $request Objeto que contém os dados da requisição
     * @param Response $response Objeto que contém a resposta HTTP
     * @param array $args Argumentos da URL (pode ser vazio)
     * @return Response Retorna a resposta com o conteúdo do formulário de login
     */
    public function index(Request $request, Response $response, array $args = []): Response
    { 
        $messages = Flash::getAll();

        // Se o usuário já estiver logado, redireciona para a página inicial
        if ($_SESSION['is_logged_in']) {
            return redirect($response, '/');
        }

        // Retorna a view do login com as mensagens de erro, se houver
        $view = $this->getTemplate('login', ['messages' => $messages]);
        $response->getBody()->write($view);

        return $response;
    }

    /**
     * Processa os dados do formulário de login, valida as informações 
     * do usuário e autentica, caso as credenciais sejam válidas.
     * 
     * @param Request $request Objeto que contém os dados da requisição
     * @param Response $response Objeto que contém a resposta HTTP
     * @return Response Retorna a resposta com o redirecionamento para a página inicial ou login
     */
    public function store(Request $request, Response $response)
    {
        // Recupera os dados do formulário e os sanitiza
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
    
        // Valida os dados
        $this->validate->required(['email', 'password']);
        $erros = $this->validate->getErros();

        // Se houver erros de validação, retorna para o login com as mensagens de erro
        if ($erros) {
            Flash::flashes($erros);
            return redirect($response, '/login');
        }

        // Tenta autenticar o usuário
        $logged = $this->login->login($email, $password);

        if ($logged) {
            // Se login for bem-sucedido, redireciona para a página inicial
            return redirect($response, '/');
        }

        // Se o login falhar, exibe mensagem de erro e retorna para a página de login
        Flash::set('message', 'Ocorreu um erro ao logar', 'danger');
        return redirect($response, '/login');
    }

    /**
     * Realiza o logout do usuário, destruindo a sessão e redirecionando
     * para a página de login.
     * 
     * @param Request $request Objeto que contém os dados da requisição
     * @param Response $response Objeto que contém a resposta HTTP
     * @return Response Retorna a resposta com o redirecionamento para a página de login
     */
    public function loggout(Request $request, Response $response)
    {
        // Realiza logout
        $this->login->logout();

        // Redireciona para a página de login
        return redirect($response, '/login');
    }
}
