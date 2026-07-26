<?php

namespace App\Controller;

use App\DAO\ProdutoDAO;
use App\Controller\ControladorGeral;
use App\Model\Produto;
use App\Util\Request;
use App\Util\Validator;

class ControladorProduto extends ControladorGeral
{
    public function getProdutos(){
        $dao = new ProdutoDAO();
        echo json_encode($dao->findAll());
    }

    public function getProdutoById($id){
        $idTratado = filter_var($id, FILTER_VALIDATE_INT);

        if(!is_int($idTratado)) exit($this->responseError("informe um número", 400));
        
        $dao = new ProdutoDAO();
        
        echo $this->responseJSON($dao->findById($idTratado));
    }

    public function criarProduto(){
        $dados = Request::body();
        
        if(!(Validator::validaProduto($dados))) exit($this->responseError("campos inválidos", 400));

        $nome = $dados['nome'];
        $preco = $dados['preco'];
        $descricao = $dados['descricao'];
        $produto = new Produto($nome, $preco, $descricao);
        $dao = new ProdutoDAO();
        $dao->insert($produto);
        
        echo $this->responseJSON(["mensagem" => "dados inseridos com sucessor"]);
    }

    public function editarProduto($id){
        $dados = Request::body();
        
        if(!(Validator::validaProduto($dados))) exit($this->responseError("campos inválidos", 400));

        $nome = $dados['nome'];
        $preco = $dados['preco'];
        $descricao = $dados['descricao'];
        $produto = new Produto($nome, $preco, $descricao);
        $dao = new ProdutoDAO();
        $dao->update($produto, $id);
        //validar se o id existe antes de mandar pro sql, tratar esse id aqui

        echo $this->responseJSON(["mensagem" => "dados atualizados com sucessor"]);
    }
}
