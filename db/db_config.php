<?php

//clase para definir credenciales para conectar con la base de datos, con la información del XAMP
class DBConfig{
    private $user ="root";
    private $password ="";
    private $dbName ="delivery_app";
    private $host ="localhost";

    //método para realizar la conección PDO

    public function connect(){
        
        try{
            //variable para guardar el string de conección, que será el primer parámetro del método PDO
            $dsn = "mysql:host=$this->host;dbname=$this->dbName";
            $connection = new PDO($dsn, $this->user, $this->password);
            //configuración de error
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;//retornamos la conexión
            echo "Conexión exitosa";
        }catch(PDOException $exception){
            echo "Conexión fallida con la base de datos ".$exception->getMessage();
        }    
    }
}
