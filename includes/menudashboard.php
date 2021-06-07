<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Name Project</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

  </head>
  <body class="h-100">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav me-auto">
                        <a class="nav-link" href="../pages/dashboard.php">Logo</a>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <a class="nav-link" href="../routes/logout.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>

        <!--Dashboard-->
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse shadow-lg">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="../pages/dashboard.php">
                                <span class="float-right"><i class="fas fa-tachometer-alt"></i></span>
                                Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../pages/criar_anuncio.php">
                                <span style="float: right;"><i class="fas fa-home dash-icons"></i></span>
                                Criar Anúnico
                                </a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="../pages/meus_anuncios.php">
                                <span style="float: right;"><i class="fas fa-edit dash-icons"></i></span>
                                Meus Anúncios


                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../pages/painel.php">
                                <span style="float: right;"><i class="fas fa-columns dash-icons"></i></span>
                                Acessar Painel
                                </a>
                            </li>
                        </ul>

                        

                        <?php if ($_SESSION['funcao'] == 'admin') { ?>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Membros</span>
                                <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                                    <span data-feather="plus-circle"></span>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="../pages/usuarios.php">
                                    <span style="float: right;"><i class="fas fa-user dash-icons"></i></span>
                                    Usuários
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                    <span style="float: right;"><i class="fas fa-cog dash-icons"></i></span>
                                    Configurar Usuários
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../pages/cad_usuario.php">
                                    <span style="float: right;"><i class="fas fa-registered dash-icons"></i></span>
                                    Cadastrar Usuários
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Configurações</span>
                            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="../pages/perfil.php">
                                <span style="float: right;"><i class="fas fa-user-circle dash-icons"></i></span>
                                Perfil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <span style="float: right;"><i class="fas fa-bell dash-icons"></i></span>
                                Atualizações 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <span style="float: right;"><i class="fas fa-user-shield dash-icons"></i></span>
                                Suporte
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>