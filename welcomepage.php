<?php
require_once("./php/funcao.php");
require_once("header.php");
revalidarLogin();
?>

<body>

    <?php require_once("page.php") ?>
    

    <div class="content">
        <h2 class="center">Página inicial. Bem vindo!</h2>
        <p class="center">Escolha uma opção no menu a esquerda</p>
        <div class="img">
            <img src="./images/welcome.gif" class="welcome">
        </div>
    </div>

    <?php require_once("footer.php") ?>
