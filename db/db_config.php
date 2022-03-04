<?php

class DBConfig{
    private $user = "root";
    private $password ="";
    private $dbname ="delivery_app";
    private $host = "localhost:8081";
    

//método de conección

public function connect(){

    try {
        //string de conección
        $dns = "mysql:host=$this->host;dbname=$dbname";

        $connection = new PDO($this->dns, $this->user, $this->password);

}