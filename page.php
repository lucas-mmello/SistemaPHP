
<body id="content" class="hidden">
    <!-- Menu lateral -->
    <div class="sidebar">
      <ion-icon id="sidebar-toggle" name="chevron-back-outline"></ion-icon>
      <nav >
        <a href="" class="theme-toggle nav-link"><ion-icon class="ion" name="invert-mode-outline"></ion-icon><span>Mudar Tema</span></a>
        <a href="welcomepage.php" class="nav-link"><ion-icon class="ion" name="home-outline"></ion-icon><span>Página Inicial</span></a>
        <a href="form_aluno.php" class="nav-link"><ion-icon class="ion" name="school-outline"></ion-icon><span>Administração de alunos</span></a>
        <a href="form_login.php" class="nav-link"><ion-icon class="ion" name="people-outline"></ion-icon><span>Administração de logins</span></a>
        <a href="form_disciplina.php" class="nav-link"><ion-icon class="ion" name="book-outline"></ion-icon><span>Administração de materias</span></a>
        <a href="form_nota.php" class="nav-link"><ion-icon class="ion" name="ribbon-outline"></ion-icon><span>Lançamento de Notas</span></a>
        <a href="pageRelatorio.php" class="nav-link"><ion-icon class="ion" name="document-text-outline"></ion-icon><span>Relatório de notas</span></a>
        <span class="user">
          <ion-icon class="person" name="person-circle-outline"></ion-icon>
        </span>
      </nav>
    </div>
    <div class="div-user">
            <p><?php echo 'Usuário: '. $_SESSION['login']; ?></p>
            <a href="proc.sessiondestroy.php" class="sair">Sair</a>
    </div>
    <header class="header">
      
      <i
        class="bx bx-menu "
        id="menu-icon"
      ></i>
      <nav class="nav">
        <p><?php echo 'Usuário: '. $_SESSION['login']; ?></p>
        <a href="" class="theme-toggle" class="nav-link">Mudar Tema</a>
        <a href="welcomepage.php" class="nav-link">Página Inicial</a>
        <a href="form_aluno.php" class="nav-link">Administração de alunos</a>
        <a href="form_login.php" class="nav-link">Administração de logins</a>
        <a href="form_disciplina.php" class="nav-link">Administração de materias</a>
        <a href="form_nota.php" class="nav-link">Lançamento de Notas</a>
        <a href="pageRelatorio.php" class="nav-link">Relatório de notas</a>
        <a href="proc.sessiondestroy.php" class="nav-link">Sair</a>
      </nav>
    </header>
    <!-- Parte principal -->
    <div class="main">
      <main>
      
  