<?php

namespace App\DAO;

use App\Model\ProdutoVenda;
use InvalidArgumentException;
use Override;

class ProdutoVendaDAO extends BaseDAO{
    #[Override]
    public function getSQLInsert(): string
    {
        return "INSERT INTO produto_venda (preco_unitario, quantidade, id_produto, id_venda) VALUES (:preco_unitario, :quantidade, :id_produto, :id_venda)";
    }

    #[Override]
    public function getDadosInsert(object $produtoVenda): array
    {
        return [
            ":preco_unitario" => $produtoVenda->getPrecoUnitario(),
            ":quantidade" => $produtoVenda->getQuantidade(),
            ":id_produto" => $produtoVenda->getIdProduto(),
            ":id_venda" => $produtoVenda->getIdVenda()
        ];  
    }

    #[Override]
    public function validarModel(object $produtoVenda): void
    {
        if(!($produtoVenda instanceof ProdutoVenda)) throw new InvalidArgumentException("
            O objeto deve ser do tipo produtoVenda
        ", 1);
    }

    #[Override]
    public function getTableName(): string
    {
        return "produto_venda";
    }
}
