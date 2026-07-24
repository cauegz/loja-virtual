<?php

namespace App\DAO;

use App\Model\Avaliacao;
use InvalidArgumentException;
use Override;

class AvaliacaoDAO extends BaseDAO{
    #[Override]
    public function getSQLInsert(): string
    {
        return "INSERT INTO avaliacao (nota,comentario,id_usuario,id_funcionario) VALUES (:nota,:comentario,:id_usuario,:id_funcionario)";
    }

    #[Override]
    public function getDadosInsert(object $avaliacao): array
    {
        return [
            ":nota" => $avaliacao->getNota(),
            ":comentario" => $avaliacao->getComentario(),
            ":id_usuario" => $avaliacao->getIdUsuario(),
            ":id_funcionario" => $avaliacao->getIdFuncionario()
        ];  
    }

    #[Override]
    public function validarModel(object $avaliacao): void
    {
        if(!($avaliacao instanceof Avaliacao)) throw new InvalidArgumentException("
            O objeto deve ser do tipo avaliação
        ", 1);
    }

    #[Override]
    public function getTableName(): string
    {
        return "avaliacao";
    }
}
