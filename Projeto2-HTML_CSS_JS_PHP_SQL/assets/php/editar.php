<?php  
    require('conectar.php');
    $id_cliente = $_POST['id_cliente'];
     // * Aqui, consultar o id na tabela do BD e enviar todos os dados para o formulário;
     // Após alterações do usuário, capturar todos os dados do formulário, validar, sanitizar....
     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $data_reg = date('Y-m-d H:i:s');

    try {    
        $upd = $conx->prepare("UPDATE $db.$tb SET nome = :nome, 
                    email = :email, data_reg = :data_reg WHERE id_cliente = :id_cliente");
        $upd->bindParam(':nome', $nome);        // Recebe os dados ok do formulário.
        $upd->bindParam(':email', $email);
        $upd->bindParam(':data_reg', $data_reg);
        $upd->bindParam(':id_cliente', $id_cliente );
        $upd->execute();  
        
        $_SESSION['mensagem'] = "Edição concluída com sucesso";
        header("Location: ./formulario.php");
        exit();      
    }  
    catch(PDOException $e) {
        $msgErr =  $upd . "Falha na atualização... " . $e->getMessage();
        // Completar envio da mensagem e retornar ao início...
        $_SESSION['mensagem'] = $msgErr;
        header("Location: ./formulario.php");      
        exit; 
    } 
  $conx = null;
 ?>
