<?php
require_once("./php/funcao.php");
require_once("header.php");
/* revalidarLogin();
 */?>

<body>
<?php require_once("page.php") ?>
        <div class="content">
            <table>
                <tr>
                    <td>dslogin</td>
                    <td>dssenha</td>
                    <td>idaluno</td>
                    <td>nmaluno</td>
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
                <hr>
                <form action="form_login.php" method="POST">
                   LOGIN: <input name="dslogin" type="text" maxlenght="29">
                   <br>
                   SENHA: <input name="dssenha" type="password" maxlenght="20">
                    <select name="idaluno" id="">
                        <?php
                            $registros = listarAlunosNaoRelacionados();

                            foreach($registros as $linha){
                                echo "<option value='" . $linha['idaluno'] . "'>" . $linha['nmAluno'] . "</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" name="comando" value="Enviar">
                </form>
            <?php
                if(isset($_POST['comando']) && ($_POST['comando'] == "Cadastrar"))
                echo "blablabla insira o codigo aq";

            ?>
        </div>
    <?php require_once("footer.php") 
    
?>
</body>

    
