<?php
  session_start();

  if(isset($_POST) && !empty($_POST)){
    //echo "Form recebido!"; //exibir apenas em testes
    extract($_POST); // Extract extrai os dados do form e salvos em variáveis php.

    // SANITIZE E VALIDE todos os dados com php abaixo!
    $nome = filter_var($nome, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    date_default_timezone_set('America/Sao_Paulo'); // Definindo o fuso horário
    $data_reg = date('Y-m-d H:i:s');
    $nome = strtoupper($nome); //convertendo nome para letras maiúsculas
    // Validar o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit; // Terminar o script caso haja um e-mail inválido
    }

    require("./conectar.php"); // Chama o script de conexão com o Banco...   
    
    // USE PLACEHOLDERS no lugar das variáveis $nome e $email! 
    try {             
      $incl = "INSERT INTO $db.$tb (nome, email, data_reg) VALUES (:nome, :email, :data_reg )";
      $res = $conx->prepare($incl);

      // USE PLACEHOLDERS e BINDPARAM() abaixo para proteger os dados...  
      $res->bindParam(':nome', $nome); //
      $res->bindParam(':email', $email); //
      $res->bindParam(':data_reg', $data_reg); //
      $res->execute(); 

      $_SESSION['mensagem'] = "Inclusão realizada com sucesso";
      header("Location: ./formulario.php"); // Volta para o formulário...    
    } 
    catch(PDOException $e) {   
      // Usar Session para enviar a mensagem à página inicial. 
      $_SESSION['mensagem'] = "Inclusão não realizada";//
      header("Location: ./formulário.php");      
      exit;
    } 
} 
    
$conx = null;

?>
