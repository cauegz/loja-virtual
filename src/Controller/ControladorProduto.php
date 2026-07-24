<?php

namespace App\Controller;

use App\DAO\ProdutoDAO;

class ControladorProduto
{
    public function getProdutos(){
        header("Content-Type: application/json");

        $dao = new ProdutoDAO();
        echo json_encode($dao->findAll());
    }

    //TODO:
    //1. tratar parâmetro da url
    //2. adicionar mensagem de erro quando nao achar nada
    //3. melhorar validações
    public function getProdutoById(int $id){
        header("Content-Type: application/json");

        $dao = new ProdutoDAO();
        echo json_encode($dao->findById($id));
    }
}
