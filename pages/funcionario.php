<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>

<?php
    //mostrar quantidade de anuncios
    $get_qtd_anun = "SELECT count(id) AS total_anuncio FROM criar_anuncio";
    $query_result = mysqli_query($conn, $get_qtd_anun);
    $query_values = mysqli_fetch_assoc($query_result);
    $num_anun = $query_values['total_anuncio'];

    //mostrar quantidade de usuarios cadastrados
    $get_qtd_user = "SELECT count(id) AS total_user FROM usuario";
    $query_result_user = mysqli_query($conn, $get_qtd_user);
    $query_values_user = mysqli_fetch_assoc($query_result_user);
    $num_user = $query_values_user['total_user'];
?>

    <div class="container" style="margin-top: 3em;">
        <div>
            <h4 style="font-weight: 300;">Olá <span class="username-dashboard"><?php echo $_SESSION['nome_usuario']; ?></span></h4>
            <small class="badge bg-web"><i class="fas fa-user"></i> <?php echo $_SESSION['funcao']; ?></small>
            
        </div>

        <br>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="area-dashboard">
                    <h1 class="h4 mb-3">Dashboard</h1>

                    <div class="link-dash mb-3"><span style="float: right;"><i class="fas fa-home dash-icons"></i></span><a class="link-dash-a" href="../pages/criar_anuncio.php">Criar Anúncio </a></div>
                    <div class="link-dash mb-3"><span style="float: right;"><i class="fas fa-edit dash-icons"></i></span><a class="link-dash-a" href="../pages/criar_anuncio.php">Editar Meus Anúncios</a></div>
                    <div class="link-dash mb-3"><span style="float: right;"><i class="fas fa-columns dash-icons"></i></span><a class="link-dash-a" href="../pages/painel.php">Acessar Painel</a></div>
                </div>

                <div class="area-dashboard">
                    <h1 class="h4 mb-3">Configurações</h1>

                    <div class="link-dash mb-3"><span style="float: right;"><i class="fas fa-user-circle dash-icons"></i></span><a class="link-dash-a" href="../pages/perfil.php">Perfil</a></div>
                    <div class="link-dash mb-3"><span style="float: right;"><i class="fas fa-user-shield dash-icons"></i></span><a class="link-dash-a" href="../pages/criar_anuncio.php">Suporte</a></div>
                    <div class="link-dash mb-3 disabled"><span style="float: right;"><i class="fas fa-bell dash-icons"></i></span><a class="link-dash-a" href="#">Atualizações</a></div>
                    
                </div>
                
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <h1 class="h4 mb-3">Overview</h1>
                <div class="card-dashboard shadow">
                    <div class="card-area">
                        <h1 class="font-weight-bold mb-3"><?php echo $num_anun ?></h1>
                        <span style="float: right;"><i class="fas fa-home"></i></span>
                        <p>Total De Anúncios</p>
                    </div> 
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <h1 class="h4 mb-3"><i class="fas fa-users"></i></h1>
                <div class="card-dashboard shadow">
                    <div class="card-area">
                        <h1 class="font-weight-bold mb-3"><?php echo $num_user ?></h1>
                        <span style="float: right;"><i class="fas fa-users-cog"></i></span>
                        <p>Funcionários Cadastrados</p>
                    </div> 
                </div>
            </div>
            
        </div>
    </div>

    


<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../home/area_login.php");
} ?>