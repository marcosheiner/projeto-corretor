<?php
session_start();
require_once '../config/conn.php';

if (isset($_POST['btn-atualizar'])) {
    

    $nome_funcionario   = trim($_POST['nome_funcionario']);
    $email_user         = trim($_POST['email_user']);
    $telefone_user      = $_POST['telefone_user'];
    $funcao_user        = $_POST['funcao_user'];


    $id_user_session = $_POST['id_user_session'];

    $sql_update = "UPDATE usuario SET nome_funcionario = '$nome_funcionario', email_user = '$email_user', telefone_user = '$telefone_user' WHERE id = '$id_user_session'";

    if (mysqli_query($conn, $sql_update) === TRUE) {
        $_SESSION['validar_edicao'] = true;
        header("Location: ../pages/perfil.php");
        
    } else {
        $_SESSION['editar_err'] = true;
        header("Location: ../pages/perfil.php");
    }

}


?>