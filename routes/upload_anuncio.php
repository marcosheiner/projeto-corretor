<?php 
    session_start();
    include "../config/conn.php";

    

        $post_funcionario   = $_POST['post_funcionario'];
        $tipo_anuncio       = $_POST['tipo_anuncio'];
        $cidade             = $_POST['cidade'];
        $cep                = $_POST['cep'];
        $endereco           = $_POST['endereco'];
        $num_casa           = $_POST['num_casa'];
        $bairro             = $_POST['bairro'];
        $visibilidade       = $_POST['visibilidade'];
        $telefone           = $_POST['telefone'];
        $wpp                = $_POST['wpp'];
        $ftfachada          = $_FILES['ftfachada']['name'];
        $valor              = $_POST['valor'];
        $valor_neg          = $_POST['valor_neg'];
        $qtd_comodos        = $_POST['qtd_comodos'];

            //pegar id do usuario cadastrado
            $id_user_anun = $_SESSION['id'];
            
            $query = "INSERT INTO criar_anuncio (nome_funcionario, tipo_anuncio, cidade, cep, endereco, numero_casa, bairro, visibilidade, telefone, wpp, foto_fachada, valor, valor_neg, qtd_comodos, id_user_anun, data_cadastro) VALUES ('$post_funcionario', '$tipo_anuncio', '$cidade', '$cep', '$endereco', '$num_casa', '$bairro', '$visibilidade', '$telefone', '$wpp', '$ftfachada', '$valor', '$valor_neg', '$qtd_comodos', '$id_user_anun', NOW())";
            $new_query = mysqli_query($conn, $query);
            
            if (mysqli_affected_rows($conn) != 0) {
                $_SESSION['cad_sucesso'] = 'Anúncio Feito!';
                header("Location: ../pages/criar_anuncio.php");

            }else{
                $_SESSION['cad_err'] = 'Não foi possivel realizar o Anúncio!';
                header("Location: ../pages/criar_anuncio.php");

            }

    $conn->close();
    exit;
?> 