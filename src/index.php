<?php

namespace Obana\Api;

use Obana\Api\Controller\UserController;

require '../vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'GET':
        switch($uri) {
            case '/users':
                $users = New UserController();
                $resposta = $users->getUsers();
                if($resposta) {
                    http_response_code(200);
                    echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Usuarios'=> $resposta]);
                }
                break;
            case '/produtos':
                http_response_code(200);
                echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Usuarios'=> $resposta]);
                break;
        }
    break;
    case 'POST':
        switch($uri) {
            case '/users':
                $data = json_decode(file_get_contents('php://input'), true);
                $users = New UserController();
                $resposta = $users->insertUsers($data);
                http_response_code(200);
                echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Idade= '=> $resposta]);
                break;
            case '/produtos':
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Idade + 5 = '=> $resposta]);
                break;
            default:
                echo json_encode(['URI Invalido']);
                break;
        }
    break;
    case 'PUT':
        switch($uri){
            case (preg_match('/\/users\/(\d+)/', $uri, $match) ? true : false):
                $id = $match[1];
                $users = new UserController();
                $resposta = $users->updateUsers($id);
                http_response_code(200);
                echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Resultado='=> $resposta]);
                break;
            case (preg_match('/\/produtos\/(\d+)/', $uri, $match) ? true : false):
                $id = $match[1];
                $users = new UserController();
                $resposta = $users->updateUsers($id);
                http_response_code(200);
                echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Resultado='=> $resposta]);
                break;
            default:
                http_response_code(404);
                echo json_encode(['status' => false, 'Message' => 'URI nao encontrada']);
                break;
        }
        break;
    break;
    case 'DELETE':
        switch($uri){
            case (preg_match('/\/users\/(\d+)/', $uri, $match) ? true : false):
                $id = $match[1];
                $users = new UserController();
                $resposta = $users->deleteUsers($id);
                http_response_code(200);
                echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Resultado='=> $resposta]);
                break;
            case (preg_match('/\/produtos\/(\d+)/', $uri, $match) ? true : false):
                $id = $match[1];
                $users = new UserController();
                $resposta = $users->deleteUsers($id);
                http_response_code(200);
                echo json_encode(['status'=> true, 'Message'=> 'recebido com sucesso.', 'Resultado='=> $resposta]);
                break;
            default:
                http_response_code(404);
                echo json_encode(['status' => false, 'Message' => 'URI nao encontrada']);
                break;
        }
        break;
    break;
}

/*if ($methodo === 'GET' && $uri === '/vendor') {
    http_response_code(200);
    echo json_encode(
        ['status' => true, 'Message' => 'chegou com sucesso.']
    );
} elseif ($methodo === 'POST' && $uri === '/vendor') {
    $input = json_decode(file_get_contents('php//input'), true);
    $users[$id] = $input;
}
Falta terminar*/