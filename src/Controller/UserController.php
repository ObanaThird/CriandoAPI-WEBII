<?php

namespace Obana\Api\Controller;

Class UserController {
    public function getUsers(){
        return ['nome'=> 'Obana', 'idade'=> 25];
    }
    public function insertUsers(){
        $data+=5;
        return ['Idade'=>$data];
    }
    public function updateUsers(){
        $data+=5;
        return ['Idade'=>$data];
    }
    public function deleteUsers(){
        $data-=5;
        return ['Idade'=>$data];
    }
}