<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>

    <?php 
    
    //pegar todos os usuarios
    $get_users_database = "SELECT * FROM usuario";
    $result_query = $conn->query($get_users_database) or die($conn->error);
    
    ?>

    <?php if ($_SESSION['funcao'] == 'admin') {?>
        <main role="main" class="mt-4 col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="container-fluid">

                <h1 class="h4 mb-3">Lista de Usuários</h1>

                <div class="">
                    <hr class="linha-black">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control mr-1 form-control-lg border-0" placeholder="Buscar Usuário">
                        <span class="input-group-btn">
                            <button class="btn btn-search btn-lg" type="button"><i class="fas fa-search"></i></button>
                        </span>
                    </div>
                </div>

                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Nome Funcionário</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Função</th>
                                <th scope="col">Data de Cadastro</th>
                            </tr>
                        </thead>
                        <?php while($dados_users_list = $result_query->fetch_array()){ ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $dados_users_list["id"]; ?></th>
                                        <td><?php echo $dados_users_list["nome_usuario"]; ?></td>
                                        <td><?php echo $dados_users_list["nome_funcionario"]; ?></td>
                                        <td><?php echo $dados_users_list["email_user"]; ?></td>
                                        <td><?php echo $dados_users_list["telefone_user"]; ?></td>
                                        <td><?php echo $dados_users_list["funcao"]; ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($dados_users_list["data_cadastro"])); ?></td>
                                    </tr>
                                <tr>
                            </tbody>
                        <?php } ?>
                    </table>
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