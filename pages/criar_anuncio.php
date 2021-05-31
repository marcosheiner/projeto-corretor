<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>

<?php include_once '../includes/menudashboard.php'; ?>
<main role="main" class="mt-5 col-md-9 ml-sm-auto col-lg-10 px-md-4">
<br>
    <div class="container-fluid">
        <div class="area_cont">
            <h1 class="h4 mb-3">Criar Anúncio</h1>
            <hr class="linha-black">
            
            <!--form-->
            <div class="back-forms">
                
                <form action="../routes/upload_anuncio.php" method="POST" enctype="multipart/form-data">
                <?php if (isset($_SESSION['cad_sucesso'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?=$_SESSION['cad_sucesso'];?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                endif; 
                unset($_SESSION['cad_sucesso']);
                ?>

                <?php if (isset($_SESSION['cad_err'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_SESSION['cad_err'];?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                endif; 
                unset($_SESSION['cad_err']);
                ?>

                <?php if (isset($_SESSION['extensao_err'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_SESSION['extensao_err'];?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
                endif; 
                unset($_SESSION['extensao_err']);
                ?>
                    
                    <div class="row">
                        <div class="col-sm">
                            <label>Funcionário:</label>
                            <input type="text" class="form-control" name="post_funcionario" placeholder="Nome do Funcionário" value="<?php echo $_SESSION['nome_funcionario']; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label>Tipo de Anuncio:</label>
                            <select class="form-control" name="tipo_anuncio" required>
                                <option value="Aluguel" selected>Aluguel</option>
                                <option value="Venda">Venda</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label>Cidade:</label>
                            <select class="form-control" name="cidade" required>
                                <option value="Juazeiro do Norte - CE" selected>Juazeiro do Norte - CE</option>
                                <option value="Crato - CE">Crato - CE</option>
                                <option value="Barbalha - CE">Barbalha - CE</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label>CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Endereço:</label>
                            <input type="text" class="form-control" name="endereco" placeholder="Endereço" required>
                        </div>
                        <div class="col-sm">
                            <label>N°:</label>
                            <input type="text" class="form-control" name="num_casa" placeholder="123, 123 A" required>
                        </div>
                        <div class="col-sm">
                            <label>Bairro:</label>
                            <input type="text" class="form-control" name="bairro" placeholder="Bairro" required>
                        </div>
                        <div class="col-sm">
                            <label>Visibilidade:</label>
                            <select class="form-control disabled" name="visibilidade">
                                <option value="Disponível" selected>Disponível</option>
                                <option value="Indisponível">Indisponível</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Telefone / Celular:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone / Celular" required>
                        </div>
                        <div class="col-sm">
                            <label>Whatsapp:</label>
                            <input type="text" class="form-control" id="wpp" name="wpp" placeholder="Whatsapp" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm">
                            <label>Foto dos Cômodos:</label>
                            <input type="file" name="ftcomodos[]" class="form-control-file" multiple required>
                        </div>
                        <!--<div class="col-sm">
                            <label>Foto dos Cômodos:</label>
                            <input type="file" name="ftcomodos[]" class="form-control-file" multiple required>
                        </div>-->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Valor:</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="R$ 0.000,00" required>
                        </div>
                        <div class="col-sm">
                            <label>Este valor pode ser negociável?</label>
                            <select class="form-control" name="valor_neg" required>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label>Quantidade de Cômodos:</label>
                            <select class="form-control" name="qtd_comodos" required>
                                <option value="3" selected>3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="Mais de 10">Mais de 10</option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <button type="submit" name="cadastrar_anuncio" class="w-100 btn btn-anunciar btn-lg">Anunciar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>

    

<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../pages/area_login.php");
} ?>