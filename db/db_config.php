<?php

class DBConfig{
    private $user = "root";
    private $password ="";
    private $dbname ="delivery_app";
    private $host = "localhost";
    

//método de conección

public function connect(){

    try {
        //string de conección
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";

        $connection = new PDO($dsn, $this->user, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión exitosa";
    }catch(PDOException $exception){
        echo "Error en la db " . $exception->getMessage();
    }

}

}

/*
$dbConnection = new DBConfig();

$dbConnection->connect();*/