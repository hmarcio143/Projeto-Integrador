<?php

    require_once("User.php");
    require_once("Message.php");

Class ConfigBd implements userInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url){

        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);


    }


    public function create(User $user){

        $smtp = $this->conn->prepare(
            "INSERT INTO usuario(nome,senha)
            VALUES(:nome,:senha)"
        );

        $smtp->bindParam(":nome", $user->usuario);
        $smtp->bindParam(":senha", $user->password);
        $smtp->execute();
    }

    public function findByUser($usuario){

        if($usuario != ""){
            $smtp = $this->conn->prepare("SELECT * FROM usuario WHERE nome=:nome");
            $smtp->bindParam(":nome", $usuario);
            $smtp->execute();

            if($smtp->rowCount() > 0){
                $data = $smtp->fetch();

                return $usuario;
            }else{
                return false;
            }   
        }else{
            return false;
        }

       


    }

    public function findBySenha($senha){

        if($senha != ""){
            $smtp = $this->conn->prepare("SELECT * FROM usuario WHERE senha=:senha");
            $smtp->bindParam(":senha", $senha);
            $smtp->execute();

            if($smtp->rowCount() > 0){
                $data = $smtp->fetch();

                return $senha;
            }else{
                return false;
            }   
        }else{
            return false;
        }

       


    }

}


?>