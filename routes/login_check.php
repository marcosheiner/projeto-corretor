<?php
    session_start();
    include "../config/conn.php";

    if (isset($_POST['usuario']) && isset($_POST['senha']) && isset($_POST['funcao'])) {
        
        function test_input($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $usuario    = test_input($_POST['usuario']);
        $senha      = test_input($_POST['senha']);
        $funcao     = test_input($_POST['funcao']);

        //mensagens de erro no login
        if (empty($usuario)) {
            header("Location: ../home/area_login.php?error=Usuário em Branco!");
        } elseif (empty($senha)){
            header("Location: ../home/area_login.php?error=Senha em Branco!");
        } else {
            $senha = md5($senha);
            $sql = "SELECT * FROM usuario WHERE nome_usuario='$usuario' AND senha='$senha'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                //nome de usuario unico
                $row = mysqli_fetch_assoc($result);

                if ($row['senha'] === $senha && $row['funcao'] === $funcao) {
                    $_SESSION['nome_usuario']       = $row['nome_usuario'];
                    $_SESSION['id']                 = $row['id'];
                    $_SESSION['nome_funcionario']   = $row['nome_funcionario'];
                    $_SESSION['email_user']         = $row['email_user'];
                    $_SESSION['telefone_user']      = $row['telefone_user'];
                    $_SESSION['funcao']             = $row['funcao'];
                    $_SESSION['data_cadastro']      = $row['data_cadastro'];

                    header("Location: ../pages/dashboard.php");
                }else{
                    header("Location: ../home/area_login.php?error=Usuário ou Senha Incorretos");
                }
            } else{
                header("Location: ../home/area_login.php?error=Usuário ou Senha Incorretos");
            }
        }

    }else{
        header("Location: ../home/area_login.php");
    }

?>