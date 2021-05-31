<?php 
   session_start();
   include "../config/conn.php";
   if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>



<?php include_once '../includes/menudashboard.php'; ?>

<main role="main" class="mt-5 col-md-9 ml-sm-auto col-lg-10 px-md-4">
<br>

        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/perfil.php">Voltar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Redefinir Senha</li>
                </ol>
            </nav>
            <h1 class="h4 mb-3">Redefinir Senha</h1>
            <hr class="linha-black">

            <?php
            // Define variaveis e inicializa com valores vazios
            $new_password = $confirm_password = '';
            $new_password_err = $confirm_password_err = '';
            
            // Pega dados de forms
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                // Valida nova senha
                if(empty(trim($_POST['new_password']))){
                    $new_password_err = 'Por favor, digite a nova senha.';     
                } elseif(strlen(trim($_POST['new_password'])) < 6){
                    $new_password_err = 'A senha deve ter pelo menos 3 caracteres.';
                } else{
                    $new_password = trim($_POST['new_password']);
                }
                
                // Valida conf. de senha
                if(empty(trim($_POST['confirm_password']))){
                    $confirm_password_err = 'Por favor, confirme a senha.';
                } else{
                    $confirm_password = trim($_POST['confirm_password']);
                    if(empty($new_password_err) && ($new_password != $confirm_password)){
                        $confirm_password_err = 'A senha não bate.';
                    }
                }
                    
                // Verifica erros de entrada
                if(empty($new_password_err) && empty($confirm_password_err)){
                    // Realiza o Update
                    $sql = 'UPDATE usuario SET senha = ? WHERE id = ?';
                    
                    if($stmt = $conn->prepare($sql)){
                        // Parâmetros
                        $param_password = md5($new_password);
                        $param_id = $_SESSION["id"];

                        $stmt->bind_param("si", $param_password, $param_id);
                        
                        // Executa
                        if($stmt->execute()){
                            // Finaliza seção e redireciona
                            session_destroy();
                            header("location: ../home/area_login.php");
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        $stmt->close();
                    }

                    $mysql_db->close();
                }
            }
            ?>
 

            <div class="row">
                <div class="col-md-5 col-sm">
                    <div class="back-reset-password shadow-lg">
                        <form  class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            
                            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                <label>Nova Senha:</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Nova Senha" value="<?php echo $new_password; ?>">
                                <span class="help-block"><?php echo $new_password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirmar Nova Senha:</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirme a Senha">
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-lg btn-login btn-block" value="Alterar Senha">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--container-->

</main>     
    

<?php include_once '../includes/footer.php'; ?>

<?php }else{
	header("Location: ../pages/area_login.php");
} ?>