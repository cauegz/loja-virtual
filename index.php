<?php

use App\Core\Router;
use Dotenv\Dotenv;

ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$router = new Router();

//rotas fixas sempre antes de dinamicas
$router->addRoute("GET", "/api/produtos", "Produto@getProdutos");
$router->addRoute("POST", "/api/produto", "Produto@criarProduto");
$router->addRoute("GET", "/api/produto/{id}", "Produto@getProdutoById");
$router->addRoute("DELETE", "/api/produto/{id}", "Produto@excluirProduto");
$router->addRoute("PUT", "/api/produto/{id}", "Produto@editarProduto");


try {
    $router->execute(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (InvalidArgumentException $th) {
    http_response_code(400);
    json_encode(["mensagem" => $th]);
} catch (LogicException $th) {
    http_response_code(409);
    json_encode(["mensagem" => $th]);
} catch (\Throwable $th){
    http_response_code(500);
    json_encode(["mensagem" => "erro interno"]);
}
