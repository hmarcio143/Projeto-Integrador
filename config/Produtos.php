<?php

require_once("config/Message.php");
require_once("config/User.php");
require_once("config/url.php");

Class Produtos{


    private $conn;
    private  $url;

    public function __construct(PDO $conn, $url){

        $this->conn = $conn;
        $this->url = $url;
    }


    function getProdutos(){

        $smtp = $this->conn->prepare("SELECT * FROM produtos");
        $smtp->execute();

        if($smtp->rowCount() > 0){

            $produtos= $smtp->fetchAll();
           
            return $produtos;
        }
    }

}


?>