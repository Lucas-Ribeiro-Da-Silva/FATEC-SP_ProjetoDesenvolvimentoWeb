<?php  
 session_start();
     require('conectar.php'); 
     $id_cliente = $_GET['id_cliente']; 	//Acessa o 'id' enviado através de link.
     try {
        $del =$conx->prepare("DELETE FROM $db.$tb WHERE id_cliente = :id_cliente");   
        $del->bindParam(':id_cliente', $id_cliente);
        $del->execute(); 
        $msgErr =  "Linha " . $del->rowCount() . " excluída com sucesso"; 
         // Completar: Retornar ao início e emitir mensagem (usar header() e session)...
         $_SESSION['mensagem'] = $msgErr;
         header("Location: ./formulario.php");  
     }
     catch(PDOException $e) {
        // Completar: Retornar ao início e emitir mensagem (usar header() e session)...
        $_SESSION['mensagem'] = "Exclusão não realizada.";
        header("Location: ./formulario.php");      
      exit;  
     }   
 ?>

