<?php

namespace App\DAO;

use App\Model\Usuario;
use InvalidArgumentException;
use Override;

class UsuarioDAO extends BaseDAO{
    #[Override]
    public function getSQLInsert(): string
    {
        return "INSERT INTO usuario (nome,email,cpf,senha) VALUES (:nome,:email,:cpf,:senha)";
    }

    #[Override]
    public function getDadosInsert(object $usuario): array
    {
        return [
            ":nome" => $usuario->getNome(),
            ":email" => $usuario->getEmail(),
            ":cpf" => $usuario->getCpf(),
            ":senha" => $usuario->getSenha()
        ];  
    }

    #[Override]
    public function validarModel(object $usuario): void
    {
        if(!($usuario instanceof Usuario)) throw new InvalidArgumentException("
            O objeto deve ser do tipo usuário
        ", 1);
    }

    #[Override]
    public function getTableName(): string
    {
        return "usuario";
    }
}
