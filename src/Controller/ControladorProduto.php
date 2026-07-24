<?php

namespace App\Controller;

use App\DAO\ProdutoDAO;
use App\Controller\ControladorGeral;

class ControladorProduto extends ControladorGeral
{
    public function getProdutos(){
        header("Content-Type: application/json");

        $dao = new ProdutoDAO();
        echo json_encode($dao->findAll());
    }

    public function getProdutoById($id){
        header("Content-Type: application/json");

        $idTratado = filter_var($id, FILTER_VALIDATE_INT);

        if(!is_int($idTratado)) exit($this->responseError("informe um número", 400));
        
        $dao = new ProdutoDAO();
        
        echo $this->responseJSON($dao->findById($idTratado));
    }
}
