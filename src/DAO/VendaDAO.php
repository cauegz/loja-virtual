<?php

namespace App\DAO;

use App\Model\Venda;
use InvalidArgumentException;
use Override;

class VendaDAO extends BaseDAO{
    #[Override]
    public function getSQLInsert(): string
    {
        return "INSERT INTO venda (data,valor,id_funcionario,id_usuario) VALUES (:data,:valor,:id_funcionario,:id_usuario)";
    }

    #[Override]
    public function getDadosInsert(object $venda): array
    {
        return [
            ":data" => $venda->getData(),
            ":valor" => $venda->getValor(),
            ":id_funcionario" => $venda->getIdFuncionario(),
            ":id_usuario" => $venda->getIdUsuario()
        ];  
    }

    #[Override]
    public function validarModel(object $venda): void
    {
        if(!($venda instanceof Venda)) throw new InvalidArgumentException("
            O objeto deve ser do tipo venda
        ", 1);
    }

    #[Override]
    public function getTableName(): string
    {
        return "venda";
    }
}
