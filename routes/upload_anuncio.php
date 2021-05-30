<?php 
    session_start();
    include "../config/conn.php";

    
    if (isset($_POST['cadastrar_anuncio'])) {

        $images_file = '';
        $images_file_tmp = '';
        $images_location = '../assets/img/update_foto_comodos/';
        $image_data = '';
        
        

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
        $valor              = $_POST['valor'];
        $valor_neg          = $_POST['valor_neg'];
        $qtd_comodos        = $_POST['qtd_comodos'];

        foreach($_FILES['ftcomodos']['name'] as $key_image=>$val_image){
            $images_file = $_FILES['ftcomodos']['name'][$key_image];
            $images_file_tmp = $_FILES['ftcomodos']['tmp_name'][$key_image];
            move_uploaded_file($images_file_tmp, $images_location.$images_file);
            $image_data .= $images_file." ";
        }

        

            //pegar id do usuario cadastrado
            $id_user_anun = $_SESSION['id'];
            
            $query = "INSERT INTO criar_anuncio (nome_funcionario, tipo_anuncio, cidade, cep, endereco, numero_casa, bairro, visibilidade, telefone, wpp, foto_fachada, valor, valor_neg, qtd_comodos, id_user_anun, data_cadastro) VALUES ('$post_funcionario', '$tipo_anuncio', '$cidade', '$cep', '$endereco', '$num_casa', '$bairro', '$visibilidade', '$telefone', '$wpp', '$image_data', '$valor', '$valor_neg', '$qtd_comodos', '$id_user_anun', NOW())";
            $new_query = mysqli_query($conn, $query);
            
            if (mysqli_affected_rows($conn) != 0) {
                $_SESSION['cad_sucesso'] = 'Anúncio Feito! Acesse o <b>Painel</b> ou o seu <b>Perfil</b> para visualizá-lo.';
                header("Location: ../pages/criar_anuncio.php");

            }else{
                $_SESSION['cad_err'] = 'Não foi possivel realizar o Anúncio! Tente novamente.';
                header("Location: ../pages/criar_anuncio.php");

            }
    }

        

    $conn->close();
    exit;
?> 