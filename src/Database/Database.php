<?php

namespace Obana\Api;
use PDO;

class Database {
    private $host = '127.0.0.1';
    private $db = 'my_database';
    private $user = 'root';
    private $pass = 'root';
    private $charset = 'utf8mb4';

    private $path = 'my_database.sqlite';

    public function conecta(){
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try{
            $pdo = new PDO($dsn, $this->user, $this->pass, [PDO::ATTR_EMULATE_PREPARES => false]);
            //echo 'Conexão bem sucedida.';
            return $pdo;
        } catch (PDOException $e){
            echo 'Erro ao conectar: ' . $e->getMessage();
        }
    }

    public function conectaSQLite(){
        try {
            $pdo = new PDO ("sqlite:$this->path");
            echo 'Conexão bem-sucedida com SQLite!';
        } catch (PDOException $e) {
            echo 'Erro ao conectar: ' . $e->getMessage();
        }
    }

    /*public function databaseInsert($nome, $idade){
        $query = "INSERT INTO users (nome, idade) VALUES (:nome, :idade)";
        $stmt = $this->dsn->prepare($query);
        $stmt->bindParam(':nome' ,$nome);
        $stmt->bindParam(':idade' ,$idade);
        $stmt->execute();
    }*/
}

//$con = new Database();
//$con->conecta();