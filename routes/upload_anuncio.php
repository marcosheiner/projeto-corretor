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
        $image_file_fachada = '';
        $image_tmp_fachada = '';
        $image_data_fachada = '';
        
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

        $extensao_permitida = array('jpg', 'jpeg', 'JPG', 'JPEG', 'Jpg', 'Jpeg');



            /*if (isset($_FILES['ftfachada'])) {
                //FACHADA
                $image_file_fachada = $_FILES['ftfachada']['name'];
                $extensao = pathinfo($image_file_fachada, PATHINFO_EXTENSION);
                //FACHADA
                $image_file_fachada = str_replace('.', '-', basename($image_file_fachada, $extensao));
                $new_image_ftfachada = $image_file_fachada.time()."-".$id_user_anun.".".$extensao;

                //FACHADA
                move_uploaded_file($image_tmp_fachada, $image_fachada_location.$new_image_ftfachada);
                $image_data_fachada .= $new_image_ftfachada." ";
            } else{
                $_SESSION['extensao_err'] = 'Você colocou arquivos não suportados pelo sistema! Arquivos permitidos: <b>.jpg</b> e <b>.jpeg</b>.';
                header("Location: ../pages/criar_anuncio.php");
            }*/

            $image_fachada_name = $_FILES['ftfachada']['name'];
            $image_fachada_type = $_FILES['ftfachada']['type'];
            $image_fachada_size = $_FILES['ftfachada']['size'];
            $image_fachada_tmp = $_FILES['ftfachada']['tmp_name'];
            $image_fachada_location = "../assets/img/update_foto_fachada/";
            $extensao = pathinfo($image_fachada_name, PATHINFO_EXTENSION);

            

            //codigo para o upload das fotos dos cômodos
            foreach($_FILES['ftcomodos']['name'] as $key_image=>$val_image){
                $images_file = $_FILES['ftcomodos']['name'][$key_image];
                $images_file_tmp = $_FILES['ftcomodos']['tmp_name'][$key_image];

                $extensao = pathinfo($images_file, PATHINFO_EXTENSION);

            }

            if (in_array($extensao, $extensao_permitida)) {

                //COMODOS
                //criar novo nome para as fotos dos cômodos
                $images_file = str_replace('.', '-', basename($images_file, $extensao));
                $new_images_file = $images_file.time()."-".$id_user_anun.".".$extensao;
                //mover as fotos dos comodos para a pasta interna do projeto
                move_uploaded_file($images_file_tmp, $images_location.$new_images_file);
                $image_data_comodos .= $new_images_file." ";



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
                    $_SESSION['cad_err'] = 'Não foi possivel realizar o Anúncio! Tente novamente.';
                    header("Location: ../pages/criar_anuncio.php");

                }

            }else{
                $_SESSION['cad_err'] = 'Não foi possivel realizar o Anúncio! Tente novamente.';
                $_SESSION['extensao_err'] = 'Os arquivos inseridos não são permitidos, tente fazer upload de arquivos em formato <b>jpg</b> ou <b>jpeg</b>';
                header("Location: ../pages/criar_anuncio.php");
            }
        
    }

        

    $conn->close();
    exit;
?> 