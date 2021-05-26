<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>


        <?php
        
        if (isset($_GET['id'])) {
            $id_user_edit = mysqli_escape_string($conn, $_GET['id']);

            $sql_edit = "SELECT * FROM usuario WHERE id ='$id_user_edit'";
            $result_edit = mysqli_query($conn, $sql_edit);

            $get_dados_for_edit = mysqli_fetch_array($result_edit);
        }
        
        ?>

        <div class="container" style="margin-top: 3em;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/perfil.php">Voltar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Perfil</li>
                </ol>
            </nav>
            <h1 class="h4 mb-3">Editar Perfil</h1>
            <hr class="linha-black">

            <div>
                <div class="background-form-cad shadow-lg">
                    
                    <form action="../routes/edit_perfil.php" method="POST">
                        <input type="hidden" name="id_user_session" value="<?php echo $get_dados_for_edit['id']; ?>">
                        <div class="row mb-3">
                            <div class="col">
                                <label>Nome Funcionário:</label>
                                <input type="text" name="nome_funcionario" placeholder="Nome Completo" class="form-control" value="<?php echo $get_dados_for_edit['nome_funcionario']; ?>" required>
                            </div>
                            <div class="col">
                                <label>Nome Usuário:</label>
                                <input type="text" name="nome_usuario" placeholder="Usuário" class="form-control" value="<?php echo $get_dados_for_edit['nome_usuario']; ?>" disabled>
                            </div>
                            <div class="col">
                                <label>E-mail:</label>
                                <input type="email" name="email_user" placeholder="examplo@mail.com" class="form-control" value="<?php echo $get_dados_for_edit['email_user']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Telefone:</label>
                                <input type="text" class="form-control" name="telefone_user" placeholder="(00) 90000-0000" id="telefone" value="<?php echo $get_dados_for_edit['telefone_user']; ?>" required>
                            </div>
                            <div class="col">
                                <label>Função:</label>
                                <input type="text" class="form-control" name="funcao_user" value="<?php echo $get_dados_for_edit['funcao']; ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <button type="submit" name="btn-atualizar" class="w-100 btn btn-cadastrar btn-lg">Atualizar Dados</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    

<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../pages/area_login.php");
} ?>