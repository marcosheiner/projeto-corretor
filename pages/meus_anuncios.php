<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>

    <?php 
    
    //pegar todos os anuncios feitos por usuario
    $sel_anun_database = "SELECT * FROM criar_anuncio WHERE id_user_anun='$_SESSION[id]' ORDER BY id DESC";
    $result_anun = $conn->query($sel_anun_database) or die($conn->error);

    ?>
<main role="main" class="mt-5 col-md-9 ml-sm-auto col-lg-10 px-md-4">
<br>
    <div class="container-fluid" >

        <?php if (isset($_SESSION['edit_sucesso'])): ?>
            <div class="alert alert-success" role="alert">
                <?=$_SESSION['edit_sucesso'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php 
        endif; 
            unset($_SESSION['edit_sucesso']);
        ?>
        
        <?php if (mysqli_affected_rows($conn) <= 0) { ?>

            <div class="alert">
                <div class="text-center">
                    <p class="lead">Você não tem anúncios para editar. <a href="../pages/criar_anuncio.php">Criar primeiro anúncio</a></p>
                </div>
            </div>
        
        <?php } else {?>
            <h1 class="h4 mb-3">Meus Anúncios</h1>
            <div class="row">
                <?php while($dados_anun = $result_anun->fetch_array()){ ?>
                    <div class="col-xl-4 col-md-6 mb-4">  
                        <div class="area-card-painel">
                            <div class="card card-anun shadow-sm" style="width: 18rem;">
                                <img src="<?php echo "../assets/img/update_foto_fachada/".$dados_anun["foto_fachada"];?>" class="card-img-top" alt="foto fachada">
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
                                    <a href="../pages/area_anuncio.php?open_anuncio=<?php echo $dados_anun["id"];?>" class="w-100 btn-lg btn btn-card mb-2">Detalhes</a>
                                    <a href="../pages/edit_anuncio.php?open_editar_anuncio=<?php echo $dados_anun['id']; ?>" class="w-100 btn-lg btn btn-editar mb-2 border">Editar</a>
                                    <a href="../pages/area_anuncio.php?open_anuncio=<?php echo $dados_anun["id"];?>" class="w-100 btn-lg btn btn-deletar mb-2 border">Deletar</a>

                                    <small>Anúnciado em <?php echo date("d/m/Y", strtotime($dados_anun["data_cadastro"])); ?></small>
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