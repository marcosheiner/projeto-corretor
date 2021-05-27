<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>
<main role="main" class="mt-4 col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container-fluid">

                    <?php if (isset($_SESSION['validar_edicao'])): ?>
                        <div class="alert alert-success" role="alert">
                            Dados alterados com sucesso! <strong>Eles serão exibidos ao logar novamente.</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php 
                    endif; 
                    unset($_SESSION['validar_edicao']);
                    ?>

                    <?php if (isset($_SESSION['editar_err'])): ?>
                        <div class="alert alert-danger" role="alert">
                            Ocorreu um erro ao editar! Tente novamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php 
                    endif; 
                    unset($_SESSION['editar_err']);
                    ?>

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="area-perfil shadow-lg">
                    <div class="area-foto">
                       <img src="../assets/img/perfil/perfil.png" alt="imagem de perfil" class="foto-perfil"> 
                    </div>
                    <div class="text-center">
                        <h1 class="h4 mt-3 mb-3"><span style="text-transform: capitalize;"><?php echo $_SESSION['nome_usuario']; ?></span></h1>
                    </div>
                    <div>
                        <span style="float: right;"><i class="fas fa-user"></i> </span>
                        <p class="bio mb-3"><?php echo $_SESSION['nome_funcionario']; ?></p>

                        <span style="float: right;"><i class="fas fa-envelope"></i> </span>
                        <p class="mb-3"><?php echo $_SESSION['email_user']; ?></p>

                        <span style="float: right;"><i class="fas fa-phone"></i> </span>
                        <p class="mb-3"><?php echo $_SESSION['telefone_user']; ?></p>
                        
                        <span style="float: right;"><i class="fas fa-cog"></i> </span>
                        <p class="bio mb-3"><?php echo $_SESSION['funcao']; ?></p>
                            
                        <span style="float: right;"><i class="fas fa-key"></i> </span>
                        <p class="bio mb-3">Código: <span class="badge badge-warning"><?php echo $_SESSION['id']; ?></span></p>
                           

                        <span style="float: right;"><i class="fas fa-clock"></i> </span>
                        <p class="bio mb-3">Iniciou: <?php echo date("d/m/Y", strtotime($_SESSION['data_cadastro'])); ?></p>
                    </div>
                </div>
                <br>
                <div class="area-perfil">
                    <a href="../pages/edit_perfil.php?id=<?php echo $_SESSION['id']; ?>" class="w-100 btn btn-lg mb-3 btn-perfil">Editar Perfil</a>
                    <a href="../pages/password_reset.php" class="w-100 btn btn-lg btn-perfil">Redefinir Senha</a>
                </div>
            </div>
            <div class="col-xl-8 col-md-6 mb-4">
                <div class="area-capa mb-3">
                    <h1 class="h3 mb-3"></h1>
                </div>

                <?php
                    //pegar todos os anuncios feitos
                    $sel_anun_database = "SELECT * FROM criar_anuncio WHERE id_user_anun='$_SESSION[id]' ORDER BY id DESC";
                    $result_anun = $conn->query($sel_anun_database) or die($conn->error);
                ?>
                
                <div class="area-perfil">
                    <span style="float: right;"><i class="fas fa-newspaper"></i></span>
                    <h1 class="h4 mb-3">Meus Anúncios</h1>
            
                    <?php if (mysqli_affected_rows($conn) > 0) {?>
                        <?php while($dados_anun = $result_anun->fetch_array()){ ?>
                            <div class="row">
                                <div class="col-sm mb-3">
                                    <div class="w-100 card card-meus-anuncios">
                                        <div class="card-body">
                                            <span class="float-right">
                                                <div class="dropdown">
                                                    <button class="btn-dropdown-perfil" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Editar Anúncio</a>
                                                        <a class="dropdown-item" href="#">Deletar Anúncio</a>
                                                        
                                                    </div>
                                                </div>
                                            </span>
                                            <h5 class="card-title mb-4"><?php echo $dados_anun["tipo_anuncio"]; ?></h5>
                                            <hr>
                                            <div class="">
                                                <span style="float: right;"><i class="fas fa-map-marked-alt"></i></span>
                                                <p class="card-text mb-2"><span class="infor-card"><?php echo $dados_anun["cidade"]; ?></span></p>
                                                <span style="float: right;"><i class="fas fa-map-pin"></i></span>
                                                <p class="card-text mb-2"><span><?php echo $dados_anun["endereco"]; ?></span></p>
                                                <span style="float: right;"><i class="fas fa-map-marker-alt"></i></span>
                                                <p class="card-text mb-3"><span><?php echo $dados_anun["bairro"]; ?></span></p>
                                            </div>
                                            <a href="#" class="btn btn-card mb-3">Detalhes</a>
                                            <p class="card-text"><small class="text-muted">Data de Anúncio: <?php echo date("d/m/Y", strtotime($dados_anun['data_cadastro'])); ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        <?php }?>
                    <?php } else {?>
                        <div class="alert text-center">
                            <p class="lead" style="font-size: 17px;">Você ainda não possui anúncio! <a href="../pages/criar_anuncio.php"><strong>Criar primeiro anúncio.</strong></a></p>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
   </div>
</main>


<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../pages/area_login.php");
} ?>