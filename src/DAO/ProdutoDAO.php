<?php

namespace App\DAO;

use App\Model\Produto;
use InvalidArgumentException;
use Override;

class ProdutoDAO extends BaseDAO{
    #[Override]
    public function getSQLInsert(): string
    {
        return "INSERT INTO produto (nome,preco,descricao) VALUES (:nome,:preco,:descricao)";
    }

    #[Override]
    public function getSQLUpdate(): string
    {
        return "UPDATE produto SET nome=:nome, preco=:preco, descricao=:descricao WHERE id_produto=:id";
    }

    #[Override]
    public function getSQLDelete(): string
    {
        return "DELETE FROM produto WHERE id_produto = :id";
    }

    #[Override]
    public function getDadosInsert(object $produto): array
    {
        return [
            ":nome" => $produto->getNome(),
            ":preco" => $produto->getPreco(),
            ":descricao" => $produto->getDescricao()
        ];  
    }

    #[Override]
    public function validarModel(object $produto): void
    {
        if(!($produto instanceof Produto)) throw new InvalidArgumentException("
            O objeto deve ser do tipo produto
        ", 1);
    }

    #[Override]
    public function getTableName(): string
    {
        return "produto";
    }

    #[Override]
    public function getDadosUpdate(object $produto, int $id): array
    {
        return [
            ":id" => $id,
            ":nome" => $produto->getNome(),
            ":preco" => $produto->getPreco(),
            ":descricao" => $produto->getDescricao()
        ];  
    }
}
