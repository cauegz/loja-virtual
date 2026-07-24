<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function addRoute(string $url, string $acao): void
    {
        $this->routes[$url] = $acao;
    }

    public function execute(string $url): void
    {
        foreach ($this->routes as $rota => $acao) {
            $parametros = [];

            //procura parâmetros da rota e substitui cada um por um grupo de captura da regex.
            $regex = preg_replace_callback(
                '/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/',
                function (array $matches) use (&$parametros): string {
                    $parametros[] = $matches[1];

                    return '([^/]+)';
                },
                $rota
            );

            //adiciona que é inicio da string e final com barra opcional
            $regex = '#^' . $regex . '/?$#';

            //se o regex nao bater com a url retorna
            if (!preg_match($regex, $url, $valores)) {
                continue;
            }

            //remove a url e deixa só os parâmetros no array valores
            array_shift($valores);

            [$nomeControlador, $funcao] = explode("@", $acao, 2);

            $controlador = "App\\Controller\\Controlador"
                . $nomeControlador;

            if (!class_exists($controlador)) {
                http_response_code(404);
                exit("Erro 404: classe não existe");
            }

            $instance = new $controlador();

            if (!is_callable([$instance, $funcao])) {
                http_response_code(404);
                exit("Erro 404: método não existe");
            }

            $resultado = $instance->$funcao(...$valores);

            if ($resultado !== null) {
                echo $resultado;
            }

            return;
        }

        http_response_code(404);
        exit("Erro 404: rota não encontrada");
    }
}