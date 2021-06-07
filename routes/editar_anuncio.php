<?php 
    session_start();
    include_once "../config/conn.php";

    
    if (isset($_POST['editar_anuncio'])) {
        
        
        //variaveis padrão do formulário
        $id_anuncio         = $_POST['id_anuncio'];
        $post_funcionario   = $_POST['post_funcionario'];
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
         


        //inserir dados do form para o banco
        $query_edit = "UPDATE criar_anuncio SET nome_funcionario='$post_funcionario', tipo_anuncio='$tipo_anuncio', cidade='$cidade', cep='$cep', endereco='$endereco', numero_casa='$num_casa', bairro='$bairro', visibilidade='$visibilidade', telefone='$telefone', wpp='$wpp', valor='$valor', valor_neg='$valor_neg', qtd_comodos='$qtd_comodos' WHERE id='$id_anuncio')";
        
                
        if ($conn->query($query_edit) === TRUE) {
            $_SESSION['edit_sucesso'] = 'Anúncio Atualizado! Acesse o <b>Perfil</b> ou <b>Meus Anúncios</b> para visualizá-lo.';
            header("Location: ../pages/meus_anuncios.php");

        }else{
            $_SESSION['edit_err'] = 'Algo deu errado, não foi possivel atualizar o Anúncio! Tente novamente.';
            header("Location: ../pages/edit_anuncio.php?id_err=$id_anuncio");

        }
    
        
    }

        

    $conn->close();
    exit;
?> 