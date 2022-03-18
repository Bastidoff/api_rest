<?php
//creamos un string con la ruta de la conexión, con dirname(__DIR__) nos ubicamos
//en la carpeta y buscamos el archivo donde está la conexión a la BD 

require_once(dirname(__DIR__)."/db/db_config.php");
if($_SERVER['REQUEST_METHOD'] == "GET"){

    //variable que me trae un dato, en este caso se lo mandamos por la url
    //http://localhost/api_rest/feautures_login/login.php?identification=123456789
    $identification = $_GET['identification'];
    //instanciamos un obejeto de la conexxión de la base de datos
    $db = new DBConfig();
    //y llamamos el método connect y lo que retorna, que es la conexión, la almacenamos en una variable
    $dbConnection = $db->connect();

    //preparamos un query para traer información de la BD
    $query = "SELECT * FROM users WHERE identification =$identification";

    //creamos una variable que nos recoja los datos
    //agregamos ->fetchALL luego del query que convierte en un arreglo asociativo
   //a la función fetchALL le mandamos como atributo PDO::FETCH_ASSOC para que solo me traiga
   //la parte asociativa del arreglo
    $users = $dbConnection->query($query)->fetchALL(PDO::FETCH_ASSOC);

    //creamos un arreglo asociativo, el cual devolveremos
    //SIEMPRE hay que devolver un arreglo asociativo desde la API
    //se hace con un ECHO con una función encode que convierta en json
    echo(json_encode($users));




    //imprimo con print_r o var_dump para saber qué tipo de datos me trae y cómo trabajar
    //print_r($users);


}
else{
    echo "No se pudo";
}
