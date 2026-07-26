<?php
namespace App\Util;

class Validator{
    public static function validaProduto(array $produto){
        $nome = trim($produto['nome']) ?? '';
        $preco = str_replace(",", ".", $produto['preco']) ?? null;
        $descricao = trim($produto['descricao']) ?? '';

        if(empty($nome) || !is_numeric($preco) || empty($descricao)) return false;

        return true;
    }
}