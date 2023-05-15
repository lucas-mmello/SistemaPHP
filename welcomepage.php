<?php
require_once("./php/funcao.php");
require_once("header.php");
revalidarLogin();
?>

<body>

    <?php require_once("page.php") ?>
    
    
    <div class="content">
        <div class="center">
            <h1 ><span class="multiple-text"></span></h1>
        </div>
        
        <p class="center large">Escolha uma opção no menu à esquerda</p>
        <p class="center small">Escolha uma opção no menu na parte superior esquerda</p>
        <div class="img">
            <img src="./images/welcome.gif" class="welcome">
        </div>
    </div>
    <?php require_once("footer.php") ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const element = document.querySelector(".multiple-text");
            if (element) {
                const typed = new window.Typed(element, {
                    strings: ["Página Inicial.", "Bem-vindo!"],
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 2000,
                    loop: true,
                });
            }
        });
    </script>

    
   
