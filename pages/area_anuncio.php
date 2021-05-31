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

        <?php if (mysqli_affected_rows($conn) <= 0) { ?>

            <div class="alert">
                <div class="text-center">
                    <p class="lead">O anúncio que você acessou pode estar quebrado ou o anúncio pode ter sido removido. <a href="../pages/painel.php">Voltar para o Painel.</a></p>
                </div>
            </div>
        
        <?php } else {?>

            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="area-cont-anuncio mb-3">
                        <h1 class="h4">Casa</h1>
                        <hr>
                        <!--DADOS DO IMÓVEL-->
                        <p class="float-right"><strong></strong> Disponível</p>
                        <p class="h5 mb-3"><strong>Aluguel</strong></p>

                        <span class="float-right"><i class="fas fa-map-marker-alt"></i></span>
                        <p class="mb-1"><strong>Cidade:</strong> Juazeiro do Norte - CE</p>

                        <span class="float-right"><i class="fas fa-map-pin"></i></span>
                        <p class="mb-1"><strong>Bairro:</strong> Salesianos</p>

                        <span class="float-right"><i class="fas fa-map-pin"></i></span>
                        <p class="mb-1"><strong>Endereço:</strong> Rua Possidônio Bem, 326</p>

                        <span class="float-right"><i class="fas fa-mail-bulk"></i></span>
                        <p class="mb-3"><strong>CEP:</strong> 63050225</p>

                        <!--CONTATO DO ANUNCIANTE-->
                        <hr>
                        <h1 class="h5"><strong>Dados para Contato</strong></h1>

                        <div class="row">
                            <div class="col">
                                <p class="mb-1"><strong>Telefone:</strong></p>
                                <p class="mb-1 btn w-100 btn-telefone">(88) 98853-1646</p>
                            </div>
                            <div class="col">
                             <p class="mb-1"><strong>Whatsapp:</strong></p>
                             <a href="" class="w-100 btn btn-wpp">Whatsapp <i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="area-cont-anuncio">
                        <span class="float-right"><i class="fas fa-dollar-sign"></i></span>
                        <h1 class="h4">Sobre o Imóvel</h1>
                        <hr>
                        <p class="float-right"><strong>Valor negociável:</strong> Sim</p>
                        <p class="h5"><strong>Valor:</strong> R$ 10.000,00</p>
                        
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="area-cont-anuncio mb-3">
                        <span class="float-right"><i class="fas fa-image"></i></span>
                        <h1 class="h5">Fachada</h1>
                        <hr>
                        <div class="area-fachada">
                            <img src="../assets/img/perfil/capa.jpeg" alt="Imagem da fachada" class="img-fachada">
                        </div>
                    </div>

                    <div class="area-cont-anuncio">
                        <span class="float-right"><i class="fas fa-images"></i></span>
                        <h1 class="h5">Cômodos</h1>
                        <hr>
                        <div class="fotorama" data-allowfullscreen="native" data-autoplay="true" style="border-radius: 10px;">
                            <img class="img-comodo" src="https://i.pinimg.com/736x/48/54/58/48545831887c996201cc8e639ba81c8a.jpg" alt="">
                            <img class="img-comodo" src="https://i.pinimg.com/564x/e1/83/71/e183718105cc704115bb48dc3b0706e6.jpg" alt="">
                            <img class="img-comodo" src="https://i.pinimg.com/564x/42/f2/98/42f29801282e58b4484f2a5669e60d0f.jpg" alt="">
                            <img class="img-comodo" src="https://i.pinimg.com/736x/48/54/58/48545831887c996201cc8e639ba81c8a.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        
        <?php } ?>
        
   </div>
</main>

<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../pages/area_login.php");
} ?>