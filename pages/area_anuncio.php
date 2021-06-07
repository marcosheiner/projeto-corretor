<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>

<?php
    //pegar dados da tabela de anuncio
    $open_anuncio = $_GET['open_anuncio'];
    $dados_anuncio_get = "SELECT * FROM criar_anuncio WHERE id='$open_anuncio'";
    $result_dados = mysqli_query($conn, $dados_anuncio_get);
    $row_dados_anuncio = mysqli_fetch_assoc($result_dados);

    //pegar as imagens dos comodos
   
    $id_anuncio = $open_anuncio;
    $select_img_comodos = "SELECT * FROM img_comodos WHERE id_anuncio ='$id_anuncio'";
    $result_select_comodos = $conn->query($select_img_comodos) or die($conn->error);

?>

<?php include_once '../includes/menudashboard.php'; ?>

    <?php 
    
    //pegar todos os anuncios feitos
    $sel_anun_database = "SELECT * FROM criar_anuncio";
    $result_anun = $conn->query($sel_anun_database) or die($conn->error);

    ?>
<main role="main" class="mt-5 col-md-9 ml-sm-auto col-lg-10 px-md-4">
<br>
    <div class="container-fluid" >

        <?php if($_GET['open_anuncio'] != $row_dados_anuncio['id']) {?>

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
                        <p class="float-right"><strong></strong> <?php echo $row_dados_anuncio['visibilidade']; ?></p>
                        <p class="h5 mb-3"><strong><?php echo $row_dados_anuncio['tipo_anuncio']; ?></strong></p>

                        <span class="float-right"><i class="fas fa-map-marker-alt"></i></span>
                        <p class="mb-1"><strong>Cidade:</strong> <?php echo $row_dados_anuncio['cidade']; ?></p>

                        <span class="float-right"><i class="fas fa-map-pin"></i></span>
                        <p class="mb-1"><strong>Bairro:</strong> <?php echo $row_dados_anuncio['bairro']; ?></p>

                        <span class="float-right"><i class="fas fa-map-pin"></i></span>
                        <p class="mb-1"><strong>Endereço:</strong> <?php echo $row_dados_anuncio['endereco']; ?>, <?php echo $row_dados_anuncio['numero_casa']; ?></p>

                        <span class="float-right"><i class="fas fa-mail-bulk"></i></span>
                        <p class="mb-3"><strong>CEP:</strong> <?php echo $row_dados_anuncio['cep']; ?></p>

                        <!--CONTATO DO ANUNCIANTE-->
                        <hr>
                        <h1 class="h5"><strong>Dados para Contato</strong></h1>

                        <div class="row">
                            <div class="col">
                                <p class="mb-1"><strong>Telefone:</strong></p>
                                <p class="mb-1 btn w-100 btn-telefone"><?php echo $row_dados_anuncio['telefone']; ?></p>
                            </div>
                            <div class="col">
                             <p class="mb-1"><strong>Whatsapp:</strong></p>
                             <a href="https://web.whatsapp.com/send?phone=55<?php echo $row_dados_anuncio['wpp']; ?>" target="_blank" class="w-100 btn btn-wpp">Whatsapp <i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="area-cont-anuncio">
                        <span class="float-right"><i class="fas fa-dollar-sign"></i></span>
                        <h1 class="h4">Sobre o Imóvel</h1>
                        <hr>
                        <p class="float-right"><strong>Valor negociável:</strong> <?php echo $row_dados_anuncio['valor_neg']; ?></p>
                        <p class="h5"><strong>Valor:</strong> R$ <?php echo $row_dados_anuncio['valor']; ?></p>
                        
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="area-cont-anuncio mb-3">
                        <span class="float-right"><i class="fas fa-image"></i></span>
                        <h1 class="h5">Fachada</h1>
                        <div class="area-fachada">
                            <img src="<?php echo "../assets/img/update_foto_fachada/".$row_dados_anuncio["foto_fachada"];?>" alt="Imagem da fachada" class="img-fachada">
                        </div>
                    </div>

                    <div class="area-cont-anuncio">
                        <span class="float-right"><i class="fas fa-images"></i></span>
                        <h1 class="h5">Cômodos</h1>
                        <div class="fotorama" data-allowfullscreen="native" data-autoplay="true" style="border-radius: 10px;">
                            <?php while($dados_img_comodos = $result_select_comodos->fetch_array()){ ?>
                                <img class="img-comodo" src="<?php echo "../assets/img/update_fotos_comodos/".$dados_img_comodos["img_file"];?>" alt=""> 
                            <?php }?>
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