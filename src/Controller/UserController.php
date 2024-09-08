<?php

namespace Obana\Api\Controller;

Class UserController {
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