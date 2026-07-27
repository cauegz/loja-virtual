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
        $id = Validator::validaInt($id);

        if(!is_int($id)) exit($this->responseError("informe um número", 400));
        
        $dao = new ProdutoDAO();
        
        echo $this->responseJSON($dao->findById($id));
    }

    public function criarProduto(){
        $dados = Request::body();
        
        if(!(Validator::validaProduto($dados))) exit($this->responseError("campos inválidos", 400));

        $nome = $dados['nome'];
        $preco = $dados['preco'];
        $descricao = $dados['descricao'];
        $produto = new Produto($nome, $preco, $descricao);
        $dao = new ProdutoDAO();

        if($dao->insert($produto)) 
            echo $this->responseJSON(["mensagem" => "dados inseridos com sucesso"]) ;
        else 
            exit($this->responseError("erro ao inserir dados", 500));
    }

    public function editarProduto($id){
        $dados = Request::body();
        $id = Validator::validaInt($id);

        if(!(Validator::validaProduto($dados))) exit($this->responseError("campos inválidos", 400));

        $nome = $dados['nome'];
        $preco = $dados['preco'];
        $descricao = $dados['descricao'];
        $produto = new Produto($nome, $preco, $descricao);
        $dao = new ProdutoDAO();

        if($dao->update($produto, $id)) 
            echo $this->responseJSON(["mensagem" => "dados editados com sucesso"]) ;
        else 
            exit($this->responseError("erro ao editar dados", 500));
    }

    public function excluirProduto($id){
        $id = Validator::validaInt($id);
        $dao = new ProdutoDAO();
        if($dao->delete($id)) 
            echo $this->responseJSON(["mensagem" => "dados exluidos com sucesso"]) ;
        else 
            exit($this->responseError("erro ao exluir dados", 500));
    }
}
