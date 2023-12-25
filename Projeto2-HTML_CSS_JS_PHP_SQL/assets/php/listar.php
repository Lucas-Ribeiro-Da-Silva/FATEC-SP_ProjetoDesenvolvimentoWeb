<?php
     $css = "../css/listar.css";
     $titulo = "Formulário";
     @include('./header.php');

     require('./conectar.php');

     echo "<main>";
     try {
          $sel = "SELECT nome, email, id_cliente, data_reg FROM $db.$tb ORDER BY id_cliente desc";
               
          $result = $conx->query($sel);
               
          // BUSQUE E IMPRIMA TODOS OS DADOS como lista, tabela etc.
          echo "<h2 class='titulo'>Relação de Clientes</h2>"; 
          echo "<div class='voltar'><button class='style-button' onclick='javascript:window.location.href=\"formulario.php\"'><a>Novo<a/></button></div>";
          echo "<div class='tabela'>";
          while($linha = $result->fetch(PDO::FETCH_ASSOC)){
               // Montagem da linha de impressão com Array e Operador ponto (.).
               echo "<div class='row'> <p class='texto'><b class='cor'>Programador: </b>".$linha['id_cliente'].
                    " - <b class='cor'>Nome: </b>".$linha['nome'].
                    " - <b class='cor'>Email: </b>".$linha['email'].
                    " - <b class='cor'>Registro: </b>".date('d/m/Y H:i:s', strtotime($linha['data_reg']))."</p>".
                    '<div class="editar"><button class="style-button"><a href="./atualizar.php?id_cliente='.$linha['id_cliente'].'">Editar</a></button></div>'.
                    '<div class="excluir"><button class="style-button"><a href="./excluir.php?id_cliente='.$linha['id_cliente'].'">Excluir<a/></button></div></div><hr>'; 
          }
          echo "</div>";
     } 
     catch(PDOException $e) {
          // Usar Session para enviar a mensagem à página inicial. 
          $_SESSION['mensagem'] = "Impressão não realizada";
          header("Location: ./formulario.php");      
          exit;
     }
     echo "</main>";
     @include('./footer.php');

?>