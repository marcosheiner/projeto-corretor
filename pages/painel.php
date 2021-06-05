<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>

    <?php 
    
    //pegar todos os anuncios feitos
    $sel_anun_database = "SELECT * FROM criar_anuncio";
    $result_anun = $conn->query($sel_anun_database) or die($conn->error);

    ?>
<main role="main" class="mt-5 col-md-9 ml-sm-auto col-lg-10 px-md-4">
<br>
    <div class="container-fluid" >

        <h1 class="h4 mb-3">Painel</h1>
        
        
        <?php if (mysqli_affected_rows($conn) <= 0) { ?>

            <div class="alert">
                <div class="text-center">
                    <p class="lead">Hmm, estamos sem anúncios no momento!</p>
                </div>
            </div>
        
        <?php } else {?>

            <div class="row">
                <?php while($dados_anun = $result_anun->fetch_array()){ ?>
                    <div class="col-xl-4 col-md-6 mb-4">  
                        <div class="area-card-painel">
                            <div class="card card-anun shadow" style="width: 18rem;">
                                <img src="https://i.pinimg.com/564x/70/75/ec/7075ece597ec66bb315b3ab8bea0ed80.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <span class="badge float-right"><?php echo $dados_anun["visibilidade"]; ?></span>
                                    <h5 class="card-title"><?php echo $dados_anun["tipo_anuncio"]; ?></h5>
                                    <div class="">
                                        <span style="float: right;"><i class="fas fa-map-marked-alt"></i></span>
                                        <p class="card-text mb-2"><?php echo $dados_anun["cidade"]; ?></p>
                                        <span style="float: right;"><i class="fas fa-map-pin"></i></span>
                                        <p class="card-text mb-2"><?php echo $dados_anun["endereco"]; ?></p>
                                        <span style="float: right;"><i class="fas fa-map-marker-alt"></i></span>
                                        <p class="card-text mb-3"><?php echo $dados_anun["bairro"]; ?></p>
                                    </div>
                                    <a href="#" class="w-100 btn-lg btn btn-card">Detalhes</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                <?php }?>
            </div>
        <?php } ?>
        
   </div>
</main>

<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../pages/area_login.php");
} ?>