<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>


    <?php if ($_SESSION['funcao'] == 'admin') {?>
        <main role="main" class="mt-5 col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <br>
            <div class="container-fluid">
                <h1 class="h4 mb-3">Cadastrar Funcionário</h1>
                <hr class="linha-black">

                <div>
                    <div class="background-form-cad shadow-lg">
                        <?php if (isset($_SESSION['validar_cadastro'])): ?>
                            <div class="alert alert-success" role="alert">
                                Usuário Cadastrado Com Sucesso!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php 
                        endif; 
                        unset($_SESSION['validar_cadastro']);
                        ?>

                        <?php if (isset($_SESSION['usuario_existe'])): ?>
                            <div class="alert alert-danger" role="alert">
                                Hmmm, esse nome de usuário já existe! Tente outro nome.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php 
                        endif; 
                        unset($_SESSION['usuario_existe']);
                        ?>
                        <form action="../routes/cad_usuario.php" method="POST">
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Nome Funcionário:</label>
                                    <input type="text" name="nome_funcionario" placeholder="Nome Completo" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label>Nome Usuário:</label>
                                    <input type="text" name="nome_usuario" placeholder="Usuário" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label>E-mail:</label>
                                    <input type="email" name="email_user" placeholder="examplo@mail.com" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Telefone:</label>
                                    <input type="text" class="form-control" name="telefone_user" placeholder="(00) 90000-0000" id="telefone" required>
                                </div>
                                <div class="col">
                                    <label>Função:</label>
                                    <select class="form-control" name="funcao_user" required>
                                        <option value="funcionário" selected>Funcionário</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class='col'>
                                    <label>Senha:</label>
                                    <input type="password" name="senha_user" class="form-control" value="123456" placeholder="Use a senha padrão!" required>
                                    <span class=""><small>Para cadastrar utilize a palavra-chave: 123456! Após entrar o usuário poderá fazer alterações em sua conta.</small></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <button type="submit" name="" class="w-100 btn btn-cadastrar btn-lg">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        
    <?php }else { header("Location: ../pages/funcionario.php"); ?>
      		<!-- FORE USERS -->
      		
    <?php } ?>

<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../pages/area_login.php");
} ?>