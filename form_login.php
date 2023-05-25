<?php
require_once("./php/funcao.php");
require_once("./header.php");
revalidarLogin();
require_once("./class/class.Login.php");
$db = new Login();
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
                        <th>Login</th>
                        <th>Senha</th>
                        <th>Código Aluno</th>
                        <th>Nome</th>
                    </tr>
                    <?php 
                    
                    $registros = $db->listarLogins();

                    foreach($registros as $linha)
                    {
                        echo '<tr>';
                        echo '      <td><a href=form_login.php?alterar=' . $linha['dslogin'] . '>' . $linha['dslogin'] . '</a> </td>';
                        echo '      <td>' . $linha['dssenha'] . '</td>';
                        echo '      <td>' . $linha['idaluno'] . '</td>';
                        echo '      <td>' . $linha['nmAluno'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </table>
                </div>  
                <div class="center">
                    <?php 
                        if(isset($_GET['alterar'])){
                    ?>
                    <h3>Alterar Senha e Excluir Login</h3>
                    <div>
                        <form action="form_login.php" method="POST">
                            <div class="inp-group">
                                <input name="dslogin" class="inp" type="text" maxlength="20" readonly value="<?php echo $_GET['alterar']?>">
                            </div>
                            
                            <div class="inp-group">
                                <ion-icon name="eye-outline" class="togglePassword"></ion-icon>
                                <input name="dssenha" type="password" maxlength="20" value="" class="inp" placeholder="SENHA...">
                            </div>
                            
                            <div class="inp-group">
                                <?php
                                    if($_GET['alterar'] != 'admin')
                                    {
                                        echo '<input name="comando" type="submit" value="Excluir" class="btn"/>';
                                    }
                                ?>
                                <input name="comando" type="submit" value="Alterar" class="btn">
                            </div>
                        </form>
                    </div>
                
                <?php 

                }

                    

                if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
                    $db->alterarAcesso($_POST['dslogin'], md5($_POST['dssenha']));
                    echo "<script> window.location.href = 'form_login.php'; </script>";
                } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                    $db->excluirAcesso($_POST['dslogin']);
                    echo "<script> window.location.href = 'form_login.php'; </script>";
                } else if (isset($_POST['comando']) && $_POST['comando'] == 'Cadastrar') {
                    $dslogin = htmlspecialchars($_POST['dslogin']);
                    $dssenha = md5($_POST['dssenha']);
                    $idaluno = $_POST['idaluno'];
                    if (trim($_POST['dslogin']) != '') {
                        $db->incluirLogin($dslogin, $dssenha, $idaluno);
                        echo "<script> window.location.href = 'form_login.php'; </script>";
                    }
                }
                ?>
            </div>
                           
                <div class="center">
                    <h3>Incluir Login</h3>
                    <div>
                        <form action="form_login.php" method="POST">
                            <div class="inp-group">
                                <input name="dslogin" class="input" type="text" maxlenght="29" placeholder="LOGIN...">
                            </div>
                            <div class="inp-group">
                                <ion-icon name="eye-outline" class="togglePassword"></ion-icon>
                                <input class="input" name="dssenha" type="password" maxlenght="20" placeholder="SENHA...">
                            </div>
                            <div class="inp-group">
                                <select name="idaluno" class="input" id="">
                                    <?php
                                        $registros = $db->listarAlunosNaoRelacionados();

                                        foreach($registros as $linha){
                                            echo "<option value='" . $linha['idaluno'] . "'>" . $linha['nmAluno'] . "</option>";
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
                    strings: ["Manutenção de Logins."],
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 5000,
                    loop: false,
                });
            }
        });
    </script>
    
</body>

    
