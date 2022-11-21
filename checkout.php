<?php
require_once("config/User.php");
require_once("config/url.php");
require_once("config/Bd.php");
require_once("config/produtos.php");
require_once("config/Message.php");


//Total de compras

if(isset($_SESSION["carrinho"])){
    if($_SESSION["carrinho"] != ''){

        $total = 0;
        foreach($_SESSION["carrinho"] as $key => $value){
        
            $total += $value["quantidade"] * $value["preco"];
        
        }

    }

}
?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>Produtos</title>
</head>

    <body>
    <?php if(isset($total)): ?>
    <div class="total">
        <p>Total:R$<?= $total?></p>
        <?php endif ?>
    </body>
    <main>
        <div class="pagamento">
        <a>Escolha a forma de pagamento</a>
        </div>
        <div class="container-pagamento">

            <div class="box-pagamento">
                <a href="agradecimento.html"> <img class="image" src="image/cartaocredito.png"/></a>
            <p>Cartão de Crédito</p>
            </div>

            <div class="box-pagamento">
                <a href="agradecimento.html"> <img class="image" src="image/boleto.png"/></a>
            <p>Boleto</p>
            </div>

            <div class="box-pagamento">
                <a href="agradecimento.html"> <img class="image" src="image/pix.jpg"/></a>
            <p>Pix</p>
            </div>
        </div>
        </main>
</html>