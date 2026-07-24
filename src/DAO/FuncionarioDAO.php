<?php

namespace App\DAO;

use App\Model\Funcionario;
use InvalidArgumentException;
use Override;

class FuncionarioDAO extends BaseDAO{
    #[Override]
    public function getSQLInsert(): string
    {
        return "INSERT INTO funcionario (nome,salario,cpf) VALUES (:nome,:salario,:cpf)";
    }

    #[Override]
    public function getDadosInsert(object $funcionario): array
    {
        return [
            ":nome" => $funcionario->getNome(),
            ":salario" => $funcionario->getSalario(),
            ":cpf" => $funcionario->getCpf()
        ];  
    }

    #[Override]
    public function validarModel(object $funcionario): void
    {
        if(!($funcionario instanceof Funcionario)) throw new InvalidArgumentException("
            O objeto deve ser do tipo funcionário
        ", 1);
    }

    #[Override]
    public function getTableName(): string
    {
        return "funcionario";
    }
}
