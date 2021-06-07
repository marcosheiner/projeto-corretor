<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>

    <?php

    
    $open_editar_anuncio = $_GET['open_editar_anuncio'];
    //select do usuario para editar dados
    $select_user = "SELECT * FROM criar_anuncio WHERE id='$open_editar_anuncio'";
    $select_result = mysqli_query($conn, $select_user);
    $select_row = mysqli_fetch_assoc($select_result);
   

    ?>

<?php include_once '../includes/menudashboard.php'; ?>
<main role="main" class="mt-5 col-md-9 ml-sm-auto col-lg-10 px-md-4">
<br>
    <div class="container-fluid">
        <div class="area_cont">
            <h1 class="h4 mb-3">Editar Anúncio</h1>
            
            
            <!--form-->
            <div class="back-forms">
                
                <form action="../routes/editar_anuncio.php" method="POST">
                

                    <?php if (isset($_SESSION['edit_err'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION['edit_err'];?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php 
                    endif; 
                    unset($_SESSION['edit_err']);
                    ?>

                    
                    <div class="row">

                        <!--input para pegar o id do usuario-->
                        <input type="hidden" name="id_anuncio" value="<?php echo $select_row['id']; ?>">

                        <div class="col-sm">
                            <label for="funcionario">Funcionário:</label>
                            <input type="text" class="form-control" id="funcionario" name="post_funcionario" placeholder="Nome do Funcionário" value="<?php echo $select_row['nome_funcionario']; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label for="tipo_anuncio">Tipo de Anuncio:</label>
                            <select class="form-control" id="tipo_anuncio" name="tipo_anuncio" required>
                                <option value="<?php echo $select_row['tipo_anuncio']; ?>" selected><?php echo $select_row['tipo_anuncio']; ?></option>
                                <option value="Aluguel">Aluguel</option>
                                <option value="Venda">Venda</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="cidade">Cidade:</label>
                            <select class="form-control" id="cidade" name="cidade" required>
                                <option value="<?php echo $select_row['cidade']; ?>" select><?php echo $select_row['cidade']; ?></option>
                                <option value="Juazeiro do Norte - CE">Juazeiro do Norte - CE</option>
                                <option value="Crato - CE">Crato - CE</option>
                                <option value="Barbalha - CE">Barbalha - CE</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="<?php echo $select_row['cep']; ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="<?php echo $select_row['endereco']; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label for="numero_casa">N°:</label>
                            <input type="text" class="form-control" id="numero_casa" name="num_casa" placeholder="123, 123 A" value="<?php echo $select_row['numero_casa']; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo $select_row['bairro']; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label for="visibilidade">Visibilidade:</label>
                            <select class="form-control disabled" id="visibilidade" name="visibilidade">
                                <option value="Disponível" selected>Disponível</option>
                                <option value="Indisponível">Indisponível</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="telefone">Telefone / Celular:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone / Celular" value="<?php echo $select_row['telefone']; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label for="wpp">Whatsapp:</label>
                            <input type="text" class="form-control" id="wpp" name="wpp" placeholder="Whatsapp" value="<?php echo $select_row['wpp']; ?>" required>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="valor">Valor:</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="R$ 0.000,00" value="<?php echo $select_row['valor']; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label for="valor_neg">Este valor pode ser negociável?</label>
                            <select class="form-control" id="valor_neg" name="valor_neg" required>
                                <option value="<?php echo $select_row['valor_neg']; ?>"><?php echo $select_row['valor_neg']; ?></option>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="qtd_comodos">Quantidade de Cômodos:</label>
                            <select class="form-control" id="qtd_comodos" name="qtd_comodos" required>
                                <option value="<?php echo $select_row['qtd_comodos']; ?>" select><?php echo $select_row['qtd_comodos']; ?></option>
                                <option value="3">3</option>
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
                            <button type="submit" name="editar_anuncio" class="w-100 btn btn-anunciar btn-lg">Atualizar Anúncio</button>
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