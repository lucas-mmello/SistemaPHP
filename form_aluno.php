<?php
require_once("./php/funcao.php");
require_once("./header.php");
revalidarLogin();
require_once("./class/class.Aluno.php");
$db = new Aluno();
?>

<body>

    <?php require_once("page.php") ?>

    <div class="content">
        <div class="center">
            <h2 ><span class="multiple-text"></span></h2>
        </div>
        
        <div class="table">
            <table >
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                </tr>

                <?php

                $rows = $db->listarAlunos();
                
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
                $aluno = $db->listarAluno($_GET['alterarid']);
            ?>
            <h3>Alterar e Excluir Aluno</h3>
            <div>
                <form action="form_aluno.php" method="POST">
                    <div class="inp-group">
                        <input type="hidden" name="idaluno" value="<?php echo $aluno[0]['idaluno']?>"/>
                        <input type="text" class="inp" name="nmAluno" value="<?php echo $aluno[0]['nmAluno']?>" maxlength="150"/>
                    </div>
                    <div class="inp-group">
                        <input type="submit" value="Alterar" name="comando" class="btn">
                        <input type="submit" value="Excluir" name="comando" class="btn">
                    </div>
                 </form>

            </div>
            
            <?php

            }
            
            if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
                echo "Comandos para alterar o aluno ";
                $db->alterarAluno($_POST['idaluno'], $_POST['nmAluno']);
                echo "<script> window.location.href = 'form_aluno.php'; </script>";
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                echo "Comandos para excluir o aluno";
                $db->excluirAluno($_POST['idaluno']);
                echo "<script> window.location.href = 'form_aluno.php'; </script>";
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Incluir') {
                echo "Comandos para incluir o aluno";
                if (trim($_POST['nmAluno']) != '') {
                    $db->incluirAluno(htmlspecialchars($_POST['nmAluno']));
                    echo "<script> window.location.href = 'form_aluno.php'; </script>";
                }
            }

            
            
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const element = document.querySelector(".multiple-text");
            if (element) {
                const typed = new window.Typed(element, {
                    strings: ["Manutenção de Aluno"],
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 5000,
                    loop: false,
                });
            }
        });
    </script>
   
