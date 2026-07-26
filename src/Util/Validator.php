<?php
namespace App\Util;

use InvalidArgumentException;

class Validator{
    public static function validaProduto(array $produto){
        $nome = trim($produto['nome']) ?? '';
        $preco = str_replace(",", ".", $produto['preco']) ?? null;
        $descricao = trim($produto['descricao']) ?? '';

        if(empty($nome) || !is_numeric($preco) || empty($descricao)) return false;

        return true;
    }
    public static function validaInt($num){
        $num = filter_var($num, FILTER_VALIDATE_INT);

        if($num === false){
            throw new InvalidArgumentException("id inválido", 400);
        }

        return $num;
    }
}