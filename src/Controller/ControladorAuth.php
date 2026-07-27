<?php
namespace App\Controller;

use App\Controller\ControladorGeral;
use App\DAO\UsuarioDAO;
use App\Util\Request;
use App\Util\Validator;
use App\Model\Usuario;

class ControladorAuth extends ControladorGeral{
    public function login(){
        $dados = Request::body();

        if(!(Validator::validaLogin($dados))) exit($this->responseError("campos inválidos", 400));

        $usuario = (new UsuarioDAO())->findByEmail($dados["email"]);

        if(!$usuario || !(password_verify($dados['senha'], $usuario->getSenha()))) exit($this->responseError("credenciais inválidas", 401));

        
    }

    public function register(){
        $dados = Request::body();
        
        if(!(Validator::validaRegistro($dados))) exit($this->responseError("campos inválidos", 400));

        $usuario = new Usuario(
            $dados['nome'],
            $dados['email'],
            password_hash($dados['senha'], PASSWORD_DEFAULT),
            $dados['cpf']
        );

        $dao = new UsuarioDAO;
        $dao->insert($usuario);
        echo $this->responseJSON(["mensagem" => "usuário cadastrado com sucesso"]);
    }
}