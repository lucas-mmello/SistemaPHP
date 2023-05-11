<?php
require_once("./php/funcao.php");
require_once("./header.php");
revalidarLogin();
?>
<body>
<?php require_once("page.php") ?>
        <div class="content ">
        <div class="center">
            <h2 ><span class="multiple-text"></span></h2>
        </div>
            <div class="table">
                <table class="glowing-table">
                    <tr>
                        <th>Código</th>
                        <th>Nota</th>
                        <th>Código Aluno</th>
                        <th>Nome</th>
                        <th>Código Disciplina</th>
                        <th>Disciplina</th>
                    </tr>
                    <?php 
                    
                    $registros = listarAvaliacoes();

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
                  $avaliacao = listarAvaliacao($_GET['alterar']);
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

                // if(isset($_POST['comando']) && ($_POST['comando'] == "Cadastrar"))
                // {
                //     echo "blablabla insira o codigo aq";
                //     $dslogin = htmlspecialchars($_POST['dslogin']);
                //     $dssenha = md5($_POST['dssenha']);
                //     $idaluno = $_POST['idaluno'];

                //     if(incluirLogin($dslogin, $dssenha, $idaluno))
                //     {
                //         header("location:form_login.php?comando=incluirok");
                //     }

                // }else if(isset($_POST['comando']) && ($_POST['comando'] == "ExcluirAcesso"))
                // {
                //     // echo "Estou na area de exclusão";
                //     excluirAcesso($_POST['dslogin']);
                //     header("location:form_login.php?comando=excluirok");
                // }
                // else if(isset($_POST['comando']) && ($_POST['comando'] == "AlterarSenha"))
                // {
                //     // echo "Estou na area de alteração";
                //     alterarAcesso($_POST['dslogin'], md5($_POST['dssenha']));
                //     header("location:form_login.php?comando=alteracaorok");
                // }
                    

                if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
                    //echo "Comandos para alterar o login ";
                    alterarNota($_POST['idavaliacao'],$_POST['nota']);
                    echo "<script> window.location.href = 'form_nota.php'; </script>";
                    //header("location:form_login.php?comando=alteracaorok");
                } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                    //echo "Comandos para excluir o login";
                    excluirNota($_POST['idavaliacao']);
                    echo "<script> window.location.href = 'form_nota.php'; </script>";
                    //header("location:form_login.php?comando=exclusaorok");
                } else if (isset($_POST['comando']) && $_POST['comando'] == 'Cadastrar') {
                    //echo "Comandos para incluir o login";
                    $nota = $_POST['nota'];
                    $idaluno = $_POST['idaluno'];
                    $iddisciplina = $_POST['iddisciplina'];
                        incluirNota($nota, $idaluno, $iddisciplina);
                        echo "<script> window.location.href = 'form_nota.php'; </script>";
                        //header("location:form_nota.php?comando=incluirok");
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
                                        $registros = listarAlunos();

                                        foreach($registros as $linha){
                                            echo "<option value='" . $linha['idaluno'] . "'>" . $linha['nmAluno'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="inp-group">
                                <select name="iddisciplina" class="input" id="">
                                    <?php
                                        $registros = listarDisciplinas();

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
                    loop: true,
                });
            }
        });
    </script>
    
</body>

    
