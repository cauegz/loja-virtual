<?php
namespace App\Util;

class Request{
    /**
     * Retorna o corpo da requisição
     */
    public static function body(): array
    {
        return json_decode(file_get_contents("php://input"), true) ?? [];
    }
    /**
     * Retorna o tipo de requisição atual
     */
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}