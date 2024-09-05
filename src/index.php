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
                    echo json_encode(['status'=> true, 'message'=> 'recebido com sucesso', 'Usuarios'=> $resposta]);
                }
                break;
            case '/produtos':
                http_response_code(200);
                echo json_encode(['status'=> true, 'message'=> 'recebido com sucesso', 'Usuarios'=> $resposta]);
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
                echo json_encode(['status'=> true, 'message'=> 'recebido com sucesso', 'dados'=> $data]);
                break;
            case '/produtos':
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status'=> true, 'message'=> 'recebido com sucesso', 'dados'=> $data]);
                break;
            default:
                echo json_encode(['URI Invalido']);
        }
    case 'PUT':
        case '/produtos':
            if(preg_match('/\/users\/(\+d)/', $uri, $match)){
                $id = $match[1];
                $users = New UserController();
                $resposta = $users->updateUsers($id);
                $data = json_decode(200);
                echo json_encode(['status'=> true, 'message'=> 'recebido com sucesso', 'id'=> $id]);
            }
            break;
        break;
    case 'DELETE':
        if(preg_match('/\/users\/(\+d)/', $uri, $match)){
            $id = $match[1];
            $users = New UserController();
            $resposta = $users->deleteUsers($id);
            $data = json_decode(200);
            echo json_encode(['status'=> true, 'message'=> 'deletado com sucesso', 'id'=> $id]);
        }
    
}

/*if ($methodo === 'GET' && $uri === '/vendor') {
    http_response_code(200);
    echo json_encode(
        ['status' => true, 'message' => 'chegou com sucesso']
    );
} elseif ($methodo === 'POST' && $uri === '/vendor') {
    $input = json_decode(file_get_contents('php//input'), true);
    $users[$id] = $input;
}
Falta terminar*/