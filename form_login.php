<?php
require_once("./php/funcao.php");
require_once("header.php");
/* revalidarLogin();
 */?>

<body>
<?php require_once("page.php") ?>
        <div class="content ">
        <div class="center">
            <h2 ><span class="multiple-text"></span></h2>
        </div>
            <div class="table">
            <table class="glowing-table">
                <tr>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Código Aluno</th>
                    <th>Nome</th>
                </tr>
                <?php 
                
                $registros = listarLogins();

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
                <?php 
                if(isset($_GET['alterar'])){

                ?>
                <hr>
                    AREA ADMIN 
                <hr>
                <form action="form_login.php" method="post">
                    LOGIN: <input name="dslogin" type="text" maxlength="20" readonly value="<?php $_GET['alterar']?>">
                    SENHA: <input name="dssenha" type="password" maxlength="20" value="">
                    <?php
                        if($_GET['alterar'] != 'admin')
                        {
                            echo ' <input name="comando" type="submit" value="ExcluirAcesso"/>';
                        }
                    ?>
                </form>
                <?php }?>
                
                           
                <div class="center"> <hr> 
                AREA DE INCLUSAO DE REGISTRO <hr>
                    <form action="form_login.php" method="POST">
                        <div>
                              <input name="dslogin" type="text" maxlenght="29" placeholder="LOGIN...">
                        </div>
                        <div>
                              <input name="dssenha" type="password" maxlenght="20" placeholder="SENHA...">
                        </div>
                        <div>
                            <select name="idaluno" id="">
                                <?php
                                    $registros = listarAlunosNaoRelacionados();

                                    foreach($registros as $linha){
                                        echo "<option value='" . $linha['idaluno'] . "'>" . $linha['nmAluno'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <input type="submit" name="comando" value="Enviar" class="btn">
                    </form>
                </div>
                
            <?php
                if(isset($_POST['comando']) && ($_POST['comando'] == "Cadastrar"))
                {
                    echo "blablabla insira o codigo aq";
                    $dslogin = htmlspecialchars($_POST['dslogin']);
                    $dssenha = md5($_POST['dssenha']);
                    $idaluno = $_POST['idaluno'];

                    if(incluirLogin($dslogin, $dssenha, $idaluno))
                    {
                        header("location:form_login.php?");
                    }

                }else if(isset($_POST['comando']) && ($_POST['comando'] == "Excluir Acesso"))
                {
                    echo "Estou na area de exclusão";
                }
                else if(isset($_POST['comando']) && ($_POST['comando'] == "Alterar Senha"))
                {
                    echo "Estou na area de alteração";
                }
                
            ?>
        </div>
        <?php require_once("footer.php") 
    
?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const element = document.querySelector(".multiple-text");
            if (element) {
                const typed = new window.Typed(element, {
                    strings: ["Manutenção de Logins."],
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 5000,
                    loop: true,
                });
            }
        });
    </script>
    
</body>

    
