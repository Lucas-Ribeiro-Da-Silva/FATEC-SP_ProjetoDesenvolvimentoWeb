<?php
    $css = "../css/formulario.css";
    $titulo = "Formulário";
    @include "./header.php";
?>

<?php
require('conectar.php');
$id_cliente = $_GET['id_cliente'];

try {
    // Consulta o registro correspondente ao id_cliente
    $consulta = $conx->prepare("SELECT * FROM $db.$tb WHERE id_cliente = :id_cliente");
    $consulta->bindParam(':id_cliente', $id_cliente);
    $consulta->execute();

    // Verifica se o registro foi encontrado
    if ($consulta->rowCount() > 0) {
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);

        // Atribui os valores recuperados às variáveis
        $nome = $linha['nome'];
        $email = $linha['email'];
        $data_reg = $linha['data_reg'];
    } else {
        // Registro não encontrado, trate essa situação conforme necessário
        // ...
    }
} catch (PDOException $e) {
    $msgErr = "Falha na consulta do registro... " . $e->getMessage();
    // Completar envio da mensagem e retornar ao início...
}

$conx = null;
?>
    <main class="main">
        <div class="titulo">
            <h1 class="h1">Contate a <span class="roxo"> instituição</span></h1>
        </div>
        <div class="img">
            <img src="../img/forms.jpg" alt="">
        </div>
        <div class="formulario">
            <form class="form" id="clientes" name="clientes" method="post" action="./editar.php">
                <fieldset>
                    <legend>Formulário de contato</legend>
                    <label for="nome"><span>*</span>Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu Nome" autofocus="autofocus" required="required" autocomplete="off" value="<?php echo $nome; ?>"/>
                    <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente; ?>"/>
                    <br>
                    <label for="email"><span>*</span>Email:</label>
                    <input type="email" id="email" name="email" placeholder="Seu E-mail" required="required" autocomplete="off" value="<?php echo $email; ?>"/>
                    <br><br>
                    <div class="bot">
                        <input id="submit-button" class="style-button" type="button" name="listar" value="Listar" onclick="window.location='./listar.php';"/> 
                        <input class="style-button" type="submit" name="incluir" value="Incluir"/>
                    </div>
                </fieldset>
            </form>
        </div>
    </main>
<?php
    @include "./footer.php";
?>