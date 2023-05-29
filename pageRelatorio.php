<?php 
    require_once("./header.php");
    require_once("./php/funcao.php");
    revalidarLogin();
?>
<html>
<head>
    <title>Relatório de Notas</title>
</head>
<body>
    <?php
    require_once("page.php");
    ?>
    <div class="content">
    <h1>Relatório de Notas</h1>
    <form action="Class/class.Relatorio.php" method="post">
        <input type="submit" value="Gerar Relatório" name="submit">
    </form>
    </div>
</body>
<?php require_once("footer.php") ?>
</html>
