<?php
require_once("./php/funcao.php");
require_once("./header.php");
revalidarLogin();
require_once("./class/class.Nota.php");
require_once("./class/class.Aluno.php");
require_once("./class/class.Disciplina.php");
$db = new Nota();
$dbAluno = new Aluno();
$dbDisc = new Disciplina();
?>
<body>
<?php require_once("page.php") ?>
        <div class="content ">
        <div class="center">
            <h2 ><span class="multiple-text"></span></h2>
        </div>
            <div class="table">
                <table >
                    <tr>
                        <th>Código</th>
                        <th>Nota</th>
                        <th>Código Aluno</th>
                        <th>Nome</th>
                        <th>Código Disciplina</th>
                        <th>Disciplina</th>
                    </tr>
                    <?php 
                    
                    $registros = $db->listarAvaliacoes();

                    foreach($registros as $linha)
                    {
                        echo '<tr>';
                        echo '      <td><a href=form_nota.php?alterar=' . $linha['idavaliacao'] . '>' . $linha['idavaliacao'] . '</a> </td>';
                        echo '      <td>' . $linha['nota'] . '</td>';
                        echo '      <td>' . $linha['idaluno'] . '</td>';
                        echo '      <td>' . $linha['nmAluno'] . '</td>';
                        echo '      <td>' . $linha['iddisciplina'] . '</td>';
                        echo '      <td>' . $linha['dsdisciplina'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </table>
                </div>  
                <div class="center">
                <?php
                  if (isset($_GET['alterar'])) {
                  $avaliacao = $db->listarAvaliacao($_GET['alterar']);
                ?>
                    <h3>Alterar e Excluir</h3>
                    <div>
                        <form action="form_nota.php" method="POST">
                            <div class="inp-group">
                              <input type="text" name="nmAluno" class="inp" value="<?php echo $avaliacao[0]['nmAluno']?>" readonly maxlength="150"/>
                            </div>
                            <div class="inp-group">
                              <input type="hidden" name="idavaliacao" value="<?php echo $avaliacao[0]['idavaliacao']?>"/>
                              <input type="number" step="1" name="nota" class="inp" value="<?php echo $avaliacao[0]['nota']?>" maxlength="150"/>
                            </div>
                            <div class="inp-group">
                                <input name="comando" type="submit" value="Excluir" class="btn"/>
                                <input name="comando" type="submit" value="Alterar" class="btn">
                            </div>
                        </form>
                    </div>
                
                <?php 

                }


                if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
                    $db->alterarNota($_POST['idavaliacao'],$_POST['nota']);
                    echo "<script> window.location.href = 'form_nota.php'; </script>";
                } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                    $db->excluirNota($_POST['idavaliacao']);
                    echo "<script> window.location.href = 'form_nota.php'; </script>";
                } else if (isset($_POST['comando']) && $_POST['comando'] == 'Cadastrar') {
                    $nota = $_POST['nota'];
                    $idaluno = $_POST['idaluno'];
                    $iddisciplina = $_POST['iddisciplina'];
                    $db->incluirNota($nota, $idaluno, $iddisciplina);
                        echo "<script> window.location.href = 'form_nota.php'; </script>";
                }
                ?>
            </div>
                           
                <div class="center">
                    <h3>Lançar Nota</h3>
                    <div>
                        <form action="form_nota.php" method="POST">
                            <div class="inp-group">
                                <input name="nota" class="input" type="number" step="1" placeholder="Nota...">
                            </div>
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
                            <div class="inp-group">
                                <select name="iddisciplina" class="input" id="">
                                    <?php
                                        $registros = $dbDisc->listarDisciplinas();

                                        foreach($registros as $linha){
                                            echo "<option value='" . $linha['iddisciplina'] . "'>" . $linha['dsdisciplina'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="inp-group">
                                <input type="submit" name="comando" value="Cadastrar" class="btn">
                            </div>
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
                    strings: ["Lançamento de Notas."],
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 5000,
                    loop: false,
                });
            }
        });
    </script>
    
</body>

    
