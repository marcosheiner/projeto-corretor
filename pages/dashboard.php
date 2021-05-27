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

    
                <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="container-fluid">
                        <div class="mb-3" style="text-transform: capitalize; color: green;"><span class=""><?php echo $_SESSION['funcao']; ?></span></div>
                        <!--conteudo da página-->
                    
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-4">
                                <h1 class="h4 mb-3">Overview</h1>
                                <div class="card-dashboard shadow-lg">
                                    <div class="card-area">
                                        <h1 class="font-weight-bold mb-3"><?php echo $num_anun ?></h1>
                                        <span style="float: right;"><i class="fas fa-home"></i></span>
                                        <p>Total De Anúncios</p>
                                    </div> 
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <h1 class="h4 mb-3"><i class="fas fa-users"></i></h1>
                                <div class="card-dashboard shadow-lg">
                                    <div class="card-area">
                                        <h1 class="font-weight-bold mb-3"><?php echo $num_user ?></h1>
                                        <span style="float: right;"><i class="fas fa-users-cog"></i></span>
                                        <p>Funcionários Cadastrados</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div><!--ROW-->
        </div><!--container-->


<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../home/area_login.php");
} ?>