<?php 
    session_start();
    include "../config/conn.php";

    
    if (isset($_POST['cadastrar_anuncio'])) {

        //variaveis das fotos dos comodos
        $images_file = '';
        $images_file_tmp = '';
        $images_location = '../assets/img/update_fotos_comodos/';
        $image_data_comodos = '';

        //variaveis da foto de fachada

        
        
        //variaveis padrão do formulário
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
        //pegar id do usuario cadastrado
        $id_user_anun = $_SESSION['id'];


        $extensao_permitida = array('jpg', 'jpeg', 'gif');

        //foto fachada
        if(isset($_FILES['ftfachada'])){
            $image_fachada_name = $_FILES['ftfachada']['name'];
            $image_fachada_type = $_FILES['ftfachada']['type'];
            $image_fachada_size = $_FILES['ftfachada']['size'];
            $image_fachada_tmp = $_FILES['ftfachada']['tmp_name'];
            $image_fachada_location = "../assets/img/update_foto_fachada/";
            $extensao = strtolower(pathinfo($image_fachada_name, PATHINFO_EXTENSION));
        }

        if(in_array($extensao, $extensao_permitida)){
            //mover fotos fachada
            $image_fachada_name = str_replace('.', '-', basename($image_fachada_name, $extensao));
            $new_image_fachada_name = $image_fachada_name.time()."-".$id_user_anun.".".$extensao;
            move_uploaded_file($image_fachada_tmp, $image_fachada_location.$new_image_fachada_name);
            $image_data_fachada .= $new_image_fachada_name." ";


            //inserir dados do form para o banco
            $query = "INSERT INTO criar_anuncio (nome_funcionario, tipo_anuncio, cidade, cep, endereco, numero_casa, bairro, visibilidade, telefone, wpp, foto_fachada, fotos_comodos, valor, valor_neg, qtd_comodos, id_user_anun, data_cadastro) VALUES ('$post_funcionario', '$tipo_anuncio', '$cidade', '$cep', '$endereco', '$num_casa', '$bairro', '$visibilidade', '$telefone', '$wpp', '$image_data_fachada', '$image_data_comodos', '$valor', '$valor_neg', '$qtd_comodos', '$id_user_anun', NOW())";
            $new_query = mysqli_query($conn, $query);
                
            if (mysqli_affected_rows($conn) != 0) {
                $_SESSION['cad_sucesso'] = 'Anúncio Feito! Acesse o <b>Painel</b> ou o seu <b>Perfil</b> para visualizá-lo.';
                header("Location: ../pages/criar_anuncio.php");

            }else{
                $_SESSION['cad_err'] = 'Algo deu errado, não foi possivel realizar o Anúncio! Tente novamente.';
                header("Location: ../pages/criar_anuncio.php");

            }

        } else {
            $_SESSION['extensao_err'] = '<b>Erro ao anúnciar!</b> Você inseriu arquivos não suportados pelo sistema';
            header("Location: ../pages/criar_anuncio.php");
        }

        $id_anuncio = $conn->insert_id;

        //fotos comodos
        if(isset($_FILES['ftcomodos'])){
            foreach ($_FILES['ftcomodos']['tmp_name'] as $key => $value) {
                $img_comodos_file   = $_FILES['ftcomodos']['name'][$key];
                $img_comodos_tmp    =$_FILES['ftcomodos']['tmp_name'][$key];
            
                $extensao = strtolower(pathinfo($img_comodos_file, PATHINFO_EXTENSION));
        
                $img_final_comodo = '';

                //if img comodos
                if(in_array($extensao, $extensao_permitida)){

                    //verifica se o nome do arquivo já tem na pasta
                    if(!file_exists('../assets/img/update_fotos_comodos/'.$img_comodos_file)){

                        move_uploaded_file($img_comodos_tmp, '../assets/img/update_fotos_comodos/'.$img_comodos_file);
                        $img_final_comodo = $img_comodos_file;

                    }else {

                        //se tiver a msm img com o msm nome ele add um novo nome
                        $img_comodos_file = str_replace('.','-',basename($img_comodos_file,$extensao));
                        $new_img_comodo = $img_comodos_file.time().".".$extensao;

                        //move a imagem para a pasta
                        move_uploaded_file($img_comodos_tmp, '../assets/img/update_fotos_comodos/'.$new_img_comodo);
                        $img_final_comodo = $new_img_comodo;
                    }
                    
                    
                    //insert img comodos na tabela das imgs de comodos
                    $query_comodos = "INSERT INTO `img_comodos`( `id_user`, `img_file`) VALUES ('$id_user_anun', '$img_final_comodo')";
                    mysqli_query($conn, $query_comodos);

                    //atualizar campo com id do anuncio
                    $conn->query("UPDATE img_comodos SET id_anuncio ='$id_anuncio' WHERE id_anuncio = 0");

                }else {
                    $_SESSION['extensao_err'] = '<b>Erro ao enviar fotos dos cômodos!</b> Você inseriu arquivos não suportados pelo sistema';
                    header("Location: ../pages/criar_anuncio.php");
                }
                
            }
        }
        
        
    }

        

    $conn->close();
    exit;
?> 