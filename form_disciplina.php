<?php
require_once("./php/funcao.php");
require_once("./header.php");
revalidarLogin();
require_once("./class/class.Disciplina.php");
$db = new Disciplina();
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
                    <th>Disciplina</th>
                </tr>

                <?php

                $rows = $db->listarDisciplinas();
                
                foreach ($rows as $registro) {
                    echo "<tr>";
                    echo "<td><a href=form_disciplina.php?alterarid=" . $registro['iddisciplina']  . '>' . $registro['iddisciplina'] . "</td>";
                    echo "<td>" . $registro['dsdisciplina'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="center">
            <?php
            if (isset($_GET['alterarid'])) {
                $disciplina = $db->listarDisciplina($_GET['alterarid']);
            ?>
            <h3>Alterar e Excluir Materia</h3>
            <div>
              <form action="form_disciplina.php" method="POST">
              <div class="inp-group">
                <input type="hidden" name="iddisciplina" value="<?php echo $disciplina[0]['iddisciplina']?>"/>
                <input type="text" class="inp" name="dsdisciplina" value="<?php echo $disciplina[0]['dsdisciplina']?>" maxlength="150"/>
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
                echo "Comandos para alterar a disciplina";
                $db->alterarDisciplina($_POST['iddisciplina'], $_POST['dsdisciplina']);
                echo "<script> window.location.href = 'form_disciplina.php'; </script>";
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                echo "Comandos para excluir a disciplina";
                $db->excluirDisciplina($_POST['iddisciplina']);
                echo "<script> window.location.href = 'form_disciplina.php'; </script>";
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Incluir') {
                echo "Comandos para incluir a disciplina";
                if (trim($_POST['dsdisciplina']) != '') {
                    $db->incluirDisciplina(htmlspecialchars($_POST['dsdisciplina']));
                    echo "<script> window.location.href = 'form_disciplina.php'; </script>";
                }
            }

           
            
            ?>
        </div>
        <div class="center">

            <h3>Incluir Disciplina</h3>

            <div>
                <form action="form_disciplina.php" method="POST">
                    <input type="text" name="dsdisciplina" value="" maxlength="150" placeholder="Disciplina..." />
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
                    strings: ["Manutenção de Materias"],
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 5000,
                    loop: false,
                });
            }
        });
    </script>
   
