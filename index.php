<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/login.css" />
    <title>Administração de Curso</title>
  </head>
  <body>
    <section class="title-container">
      <div class="title">
        <h1>Administração de Curso</h1>
      </div>
    </section>

    <section>
      <form action="./php/login.php" method="post">
        <div class="form-group">
          <label for="usuario">Usuário</label>
          <input type="text" name="dslogin" id="usuario" />

          <label for="senha">Senha</label>
          <input type="password" name="dssenha" id="senha" />
          <input type="submit" value="Acessar" class="btn" />
        </div>
        
      </form>
    </section>
  </body>
</html>
