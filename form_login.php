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
                    echo '      <td>' . $linha['dslogin'] . '</td>';
                    echo '      <td>' . $linha['dssenha'] . '</td>';
                    echo '      <td>' . $linha['idaluno'] . '</td>';
                    echo '      <td>' . $linha['nmAluno'] . '</td>';
                    echo '</tr>';
                }
                ?>
                </table>
            </div>
            
                
                <div class="center">
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
                echo "blablabla insira o codigo aq";

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

    
