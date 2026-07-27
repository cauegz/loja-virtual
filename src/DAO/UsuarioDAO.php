<?php

namespace App\DAO;

use App\Model\Usuario;
use InvalidArgumentException;
use Override;
use PDO;

class UsuarioDAO extends BaseDAO{
    #[Override]
    public function getSQLInsert(): string
    {
        return "INSERT INTO usuario (nome,email,cpf,senha) VALUES (:nome,:email,:cpf,:senha)";
    }

    #[Override]
    public function getSQLUpdate(): string
    {
        return "UPDATE usuario SET nome=:nome, email=:email, senha=:senha, cpf=:cpf WHERE id_usuario=:id";
    }

    #[Override]
    public function getSQLDelete(): string
    {
        return "DELETE FROM usuario WHERE id_usuario = :id";
    }

    #[Override]
    public function getDadosInsert(object $usuario): array
    {
        return [
            ":nome" => $usuario->getNome(),
            ":email" => $usuario->getEmail(),
            ":senha" => $usuario->getSenha(),
            ":cpf" => $usuario->getCpf()
        ];  
    }

    #[Override]
    public function getDadosUpdate(object $usuario, int $id): array
    {
        return [
            ":id" => $id,
            ":nome" => $usuario->getNome(),
            ":email" => $usuario->getEmail(),
            ":senha" => $usuario->getSenha(),
            ":cpf" => $usuario->getCpf()
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

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":email" => $email]);
        $query = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Usuario(
            $query['nome'],
            $query['email'],
            $query['senha'],
            $query['cpf']
        );
    }
}