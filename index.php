<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="./images/android-chrome-512x512.png">
    <link rel="shortcut icon" type="image/x-icon"  href="./images/favicon.ico">
    <link rel="manifest" href="./images/site.webmanifest">
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
          <ion-icon name="eye-outline" id="togglePassword"></ion-icon>
          <input type="password" name="dssenha" id="senha" />
          <input type="submit" value="Acessar" class="btn" />
        </div>
        
      </form>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./js/login.js"></script>
  </body>
</html>
