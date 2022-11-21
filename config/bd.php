<?php

    $host = "localhost";
    $user = "root";
    $db = "natal";
    $pwd = "";


    try{

        $conn = new PDO("mysql: host=$host;dbname=$db", $user, $pwd);

        //erro da conexão
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e){

        $err = $e->getMessage();
        echo "error: ". $err;

    }


?>