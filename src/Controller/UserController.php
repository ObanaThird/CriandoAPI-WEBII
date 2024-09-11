<?php

namespace Obana\Api\Controller;
use Database\Database;

Class UserController {
    private $conn;

    public function __construct(){
        $this->conn = new Database();
    }

    public function getUsers(){
        return ['nome'=> 'Obana', 'idade'=> 25];
    }
    public function insertUsers($data){
        $data+=5;
        return ['Idade + 5 = '=>$data];
    }
    public function updateUsers($data){
        $data+=5;
        return ['Idade + 5 = '=>$data];
    }
    public function deleteUsers($data){
        $data-=5;
        return ['Idade - 5 = '=>$data];
    }

}