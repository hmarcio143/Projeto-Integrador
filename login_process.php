<?php

require_once("config/User.php");
require_once("config/Message.php");
require_once("config/ConfigBd.php");
require_once("config/url.php");
require_once("config/bd.php");

$message = new Message($BASE_URL);
$userBd = new ConfigBd($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");

// $data = $_POST;

// print_r($data);


if($type == "cadastro"){
    $usuario = filter_input(INPUT_POST, "user");
    $passWord = filter_input(INPUT_POST, "password");
    $passWordConfirme = filter_input(INPUT_POST, "passwordConfirme");

    if($passWord=== $passWordConfirme){

        $User = new User();
        $User->usuario = $usuario;
        $User->password = $passWord;

        $userBd->create($User);

        $message->setMessage("Seja bem vindo!!","sucess" ,"dashbord.php");
    }else{
        $message->setMessage("Seja bem vindo!!","sucess" ,"index.php");
    }


}else if($type == "login"){
    $usuario = filter_input(INPUT_POST, "user");
    $passWord = filter_input(INPUT_POST, "password");

    if($userBd->findByUser($usuario) === $usuario){

        if($userBd->findBySenha($passWord) === $passWord){
          
            $message->setMessage("Seja bem vindo!!","sucess" ,"dashbord.php");

        }else{
            $message->setMessage("Seja bem vindo!!","sucess" ,"index.php");
        }
    }else{

        $message->setMessage("Seja bem vindo!!","sucess" ,"index.php");
    }
    

}

?>