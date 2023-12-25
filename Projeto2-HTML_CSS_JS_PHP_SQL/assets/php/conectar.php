<?php
    // Dados de acesso ao SERVIDOR.
    $host = "localhost";
    $user = "root";
    $pass = "121275";
    // Nome do Banco e da Tabela.
    $db = "banco";
    $tb = "tabela";

    // CONEXÃO COM O SERVIDOR INFORMANDO O BANCO.

    try {             
       $conx = new PDO("mysql:host=$host;dbname=$db", $user, $pass);  
       $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       //echo "Conexão ok!<br>";   // Exibir essa mensagem só no teste.
    }
    catch(PDOException $e) {
       echo "Falha na conexão com o DB:<br />" . $e->getMessage();
    }  
?>