<?php
    require_once("config/url.php");
    require_once("config/bd.php");
    require_once("config/Message.php");

    $message = new Message($BASE_URL);
    $flassMensage = $message->getMessage();


    if(!empty($flassMensage["msg"])){

        $message->clearMesager();
    }



?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>NatAll</title>
</head>

<body>
    

    <?php if(!empty($flassMensage["msg"])):?>

    <div class="msg-container">
        <p class="msg<?= $flassMensage["type"] ?>"><?= $flassMensage["msg"] ?></p>
    </div>
  


<?php endif ?>
    <main class="main-index">
        <div class="logo">
    </div>

    
   
    <div class="container-index">
        <div class="box-apresentacao">
        <img class="profile-pic" src="image/natall.jpg" />
        <h2 class="title">O melhor natal para todos!</h2>
   
        <div><h3>Faça seu login</h3></div>
        <div class="login">
            <form action="<?=$BASE_URL?>login_process.php" method="post">
                <input  type="hidden" name="type" value="login" required>
                <input  type="text" name="user" placeholder="Digite seu usuario" required>
                <input  type="password" name="password" placeholder="Digite sua senha" required>
                <input  type="submit" value="Entrar">
            </form>
        </div>
        <div><h3>Cadastro</h3></div>
        <div class="cadastro">
            <form action="<?=$BASE_URL?>login_process.php" method="post">
            <input type="hidden" name="type" value="cadastro">
                    <input  type="text" name="user" placeholder="Digite seu usuario" required>
                    <input  type="password" name="password" placeholder="Digite sua senha" required>
                    <input  type="password" name="passwordConfirme" placeholder="Digite Novamente sua senha" required>
                    <input  type="submit" value="Cadastrar">
            </form>
        </div>
    </div>

        
    </main>
    

</body>
</html>