<?php
require_once("config/User.php");
require_once("config/url.php");
require_once("config/Bd.php");
require_once("config/produtos.php");
require_once("config/Message.php");

$itens = new Produtos($conn,$BASE_URL);
$message = new Message($BASE_URL);

$flassMensage = $message->getMessage();


    if(!empty($flassMensage["msg"])){

        $message->clearMesager();
    }


    
    
// print_r($_SESSION['msg']);


$produtos = $itens->getProdutos();

if(isset($_GET["adicionar"])){
    $idProduto = (int) $_GET["adicionar"];
    if(isset($produtos[$idProduto -1 ])){
        if(isset($_SESSION["carrinho"][$idProduto - 1])){
            $_SESSION["carrinho"][$idProduto - 1]["quantidade"]++;
            $message->setMessage("Produto adicionado ao seu carrinho" ,"sucess" ,"dashbord.php");
           
        }else{
            $_SESSION["carrinho"][$idProduto -1] = 
            array("quantidade" =>1, "nome"=>$produtos[$idProduto -1 ]["nome"],
             "preco"=>$produtos[$idProduto -1 ]["preco"], "descricao"=>$produtos[$idProduto -1 ]["descricao"]);

             $message->setMessage("Produto adicionado ao seu carrinho" ,"sucess" ,"dashbord.php");
            
        }
                
    }else{

        $message->setMessage("Produto não encontrado","sucess" ,"dashbord.php"); 

          
}
}


//Total de compras

    if(isset($_SESSION["carrinho"])){
        if($_SESSION["carrinho"] != ''){

            $total = 0;
            foreach($_SESSION["carrinho"] as $key => $value){
            
                $total += $value["quantidade"] * $value["preco"];
            
            }
    
        }

    }


///limpar carrinho

if(isset($_GET["limpar"])){

    unset($_SESSION["carrinho"]);

    $message->setMessage("Seu carrinho foi limpo","sucess" ,"dashbord.php");
}

//Sair da conta e pagar o dados
if(isset($_GET["sair"])){
    unset($_SESSION["carrinho"]);

    $message->setMessage("Você foi deslogado!!","sucess" ,"index.php");
}

?>

<?php if(!empty($flassMensage["msg"])):?>

<div class="msg-container">
    <p class="msg<?= $flassMensage["type"] ?>"><?= $flassMensage["msg"] ?></p>
</div>


<?php endif ?>


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

    <main>
        <div class="exit">
        <a href="?sair=">Sair da conta</a>
        </div>
        <div class="container-produtos">

            <div class="box-produto">
                <img class="image" src="image/arvoredenatal.png">
                <p>Produto: <?= $produtos[0]["nome"]?></p>
                <p>Preço: R$<?= $produtos[0]["preco"]?></p>
                <p>Sobre o Produto: <?= $produtos[0]["descricao"]?></p>
                <a href="?adicionar=<?= $produtos[0]["id"]?>">Adicionar no carrinho</a>
            </div>

            <div class="box-produto">
                <img class="image" src="image/botadenatal.png">
                <p>Produto: <?= $produtos[1]["nome"]?></p>
                <p>Preço: R$<?= $produtos[1]["preco"]?></p>
                <p>Sobre o Produto: <?= $produtos[1]["descricao"]?></p>
                <a href="?adicionar=<?= $produtos[1]["id"]?>">Adicionar no carrinho</a>
            </div>

            <div class="box-produto">
                <img class="image" src="image/senhornoel.jpg">
                <p>Produto: <?= $produtos[2]["nome"]?></p>
                <p>Preço: R$<?= $produtos[2]["preco"]?></p>
                <p>Sobre o Produto: <?= $produtos[2]["descricao"]?></p>
                <a href="?adicionar=<?= $produtos[2]["id"]?>">Adicionar no carrinho</a>
            </div>
        </div>


       





    <!-- carrinho de compras -->

        

        <div class="box-carrinho"> 
            <?php  if(isset($_SESSION["carrinho"])):?>
                <?php foreach($_SESSION["carrinho"] as $key => $value): ?>
                        <?php if( $value["nome"] != null && $value["quantidade"] != null && $value["preco"] != null ): ?>
                         
                        <p>Produto: <?=$value["nome"]?></p>
                        <p>Quantidade = <?=$value["quantidade"]?>
                        <p>Preço = $R$<?=$value["quantidade"] * $value["preco"]?></p>
                        <br> 
                                
                        
                        <?php endif ;?>
                <?php endforeach; ?>
                <?php else: ?>
                            <p>Carrinho vazio</p>
            <?php endif?>
        </div>
       


        <?php if(isset($total)): ?>
            <div class="total">
                <p>Total:R$<?= $total?></p>
                <div class="botaopagamento"> 
                    <a href="checkout.php">Ir para pagamento</a>
                <a href="checkout.php"><img src="image/carrinho.jpg" alt="Ir para pagamento" /></a>
                </div>
            <div class="botaocarrinho">  <a href="?limpar=">Limpar carrinho</a> </div>
            
        </div>
        <?php endif ?>

        



        
    </main>



    
    
</body>
</html>