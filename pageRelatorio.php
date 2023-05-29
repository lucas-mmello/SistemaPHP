<?php 
    require_once("./header.php");
    require_once("./php/funcao.php");
    require_once("./class/class.Aluno.php");
    revalidarLogin();
    $dbAluno = new Aluno();
?>
<body>
    <?php
    require_once("page.php");
    ?>
    <div class="content">
        <div class="center">
            <h2><span class="multiple-text"></span></h2>
            <form action="class/class.Relatorio.php" method="post" target="_blank">
                <div class="inp-group">
                    <select name="idaluno" class="input" id="">
                        <?php
                            $registros = $dbAluno->listarAlunos();

                            foreach($registros as $linha){
                                echo "<option value='" . $linha['idaluno'] . "'>" . $linha['nmAluno'] . "</option>";
                            }
                        ?>
                     </select>
                </div>
                <input type="submit" value="Gerar Relatório" name="submit" class="btn" id='relatorio'>
            </form>
            <div class="img anim">
                <img src="./images/animacao.gif" class="animacao">
            </div>
        </div>
    </div>
<?php require_once("footer.php") ?>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const element = document.querySelector(".multiple-text");
            if (element) {
                const typed = new window.Typed(element, {
                    strings: ["Relatório de Notas"],
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 5000,
                    loop: false,
                });
            }
        });
    </script>
</body>