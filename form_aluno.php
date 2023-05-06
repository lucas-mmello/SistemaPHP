<?php
require_once("./php/funcao.php");
require_once("./header.php");
revalidarLogin();
?>

<body>

    <?php require_once("page.php") ?>

    <div class="content">
        <h2 class="center">Manutenção de aluno</h2>
        <div class="table">
            <table class="floating-table">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                </tr>

                <?php

                $rows = listarAlunos();
                
                foreach ($rows as $registro) {
                    echo "<tr>";
                    echo "<td><a href=form_aluno.php?alterarid=" . $registro['idaluno']  . '>' . $registro['idaluno'] . "</td>";
                    echo "<td>" . $registro['nmAluno'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="center">
            <?php
            if (isset($_GET['alterarid'])) {
                $aluno = listarAluno($_GET['alterarid']);
            ?>
            <form action="form_aluno.php" method="POST">
                <input type="hidden" name="idaluno" value="<?php echo $aluno[0]['idaluno']?>"/>
                <input type="text" name="nmAluno" value="<?php echo $aluno[0]['nmAluno']?>" maxlength="150"/>
                <input type="submit" value="Alterar" name="comando" class="btn">
                <input type="submit" value="Excluir" name="comando" class="btn">
            </form>

            <?php

            }
            
            if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
                echo "Comandos para alterar o aluno ";
                alterarAluno($_POST['idaluno'], $_POST['nmAluno']);
                header("location:form_aluno.php?comando=alteracaook");
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                echo "Comandos para excluir o aluno";
                excluirAluno($_POST['idaluno']);
                header("location:form_aluno.php?comando=excluirok");
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Incluir') {
                echo "Comandos para incluir o aluno";
                if (trim($_POST['nmAluno']) != '') {
                    incluirAluno(htmlspecialchars($_POST['nmAluno']));
                    header("location:form_aluno.php?comando=incluirok");
                }
            }

            // dumpF($_GET);
            // dumpF($_POST);
            
            ?>
        </div>
        <div class="center">

            <h3>Incluir Aluno</h3>

            <div>
                <form action="form_aluno.php" method="POST">
                    <input type="text" name="nmAluno" value="" maxlength="150" placeholder="NOME..." />
                    <input type="submit" value="Incluir" name="comando" class="btn">
                </form>
            </div>
            

            <?php


            ?>
        </div>
    </div>
    <?php require_once("footer.php") ?>
