<?php

// EXECUTE ESTE SCRIPT SOMENTE PARA CRIAR O BANCO E A TABELA!

// Dados de acesso ao SERVIDOR.
$host = "localhost";
$user = "root";
$pass = "121275";
// Nome do Banco e da Tabela.
$db = "banco";
$tb = "tabela";

// PRIMEIRA CONEXÃO COM O SERVIDOR.

try {             
   $conx = new PDO("mysql:host=$host", $user, $pass);  
   $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   //echo "Conexão ok!<br>";    // Exibir essa mensagem só no teste.
}
catch(PDOException $e) {
   echo "Falha de conexão:<br />" . $e->getMessage();
}  

// CRIAÇÃO DO BANCO...

if($conx){   // Boolean...
   try {	  
      $criadb = "CREATE DATABASE $db";
      $conx->exec($criadb);
      //echo "Database ok!<br>";   // Exibir essa mensagem só no teste. 
   }
   catch(PDOException $e) {
      echo $criadb . "Falha na criação do DB:<br />" . $e->getMessage();
   }
}

// *** SEGUNDA CONEXÃO COM O SERVIDOR INFORMANDO O BANCO.


try {             
   $conx = new PDO("mysql:host=$host;dbname=$db", $user, $pass);  
   $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   //echo "Conexão ok!<br>";    // Exibir essa mensagem só no teste!
}
catch(PDOException $e) {
   echo "Falha na criação do DB:<br />" . $e->getMessage();
} 

// CRIAÇÃO DA TABELA... 

if($conx){   
    try {	
	  $criatb = "CREATE TABLE $db.$tb (
	  id_cliente INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	  nome       VARCHAR(50) NOT NULL,
	  email      VARCHAR(50) NOT NULL,
	  data_reg   TIMESTAMP)
      ENGINE=InnoDB DEFAULT CHARSET=latin1";     
      // Formato da data: YYYY-MM-DD HH:MM:SS 


      $conx->exec($criatb);          
	  //echo "<p>Tabela ok!</p>";    // Exibir essa mensagem só no teste!
    }      
    catch(PDOException $e) { 
         echo $criatb ."Falha Tabela:<br>". $e->getMessage();
    }
}


// Encerra a conexão..
    
$conx = null;  

?>
