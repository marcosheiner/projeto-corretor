<?php
session_start();
include '../config/conn.php';

$nome_funcionario = trim($_POST['nome_funcionario']);
$nome_usuario = trim($_POST['nome_usuario']);
$email_user = trim($_POST['email_user']);
$telefone_user = $_POST['telefone_user'];
$funcao_user = $_POST['funcao_user'];
$senha_user = trim(md5($_POST['senha_user']));

$check_sql = "SELECT COUNT(*) AS total FROM usuario WHERE nome_usuario ='$nome_usuario'";
$result_sql = mysqli_query($conn, $check_sql);
$row_sql = mysqli_fetch_assoc($result_sql);

if ($row_sql['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header("Location: ../pages/cad_usuario.php");
    exit;
}

$check_sql = "INSERT INTO usuario (nome_usuario, nome_funcionario, email_user, telefone_user, senha, funcao, data_cadastro) VALUES ('$nome_usuario', '$nome_funcionario', '$email_user', '$telefone_user', '$senha_user', '$funcao_user', NOW())";

if ($conn->query($check_sql) === TRUE) {
    $_SESSION['validar_cadastro'] = true;

}

$conn->close();
header("Location: ../pages/cad_usuario.php");
exit;
?>