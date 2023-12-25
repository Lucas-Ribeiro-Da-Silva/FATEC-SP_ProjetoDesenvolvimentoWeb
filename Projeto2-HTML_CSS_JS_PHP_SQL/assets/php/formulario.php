<?php
    $css = "../css/formulario.css";
    $titulo = "Formulário";
    @include "./header.php";
?>
    <main class="main">
        <div class="titulo">
            <h1 class="h1">Contate a <span class="roxo"> instituição</span></h1>
        </div>
        <div class="img">
            <img src="../img/forms.jpg" alt="">
        </div>
        <div class="formulario">
            <form class="form" id="clientes" name="clientes" method="post" action="./incluir.php">
                <fieldset>
                    <legend>Formulário de contato</legend>
                    <?php
                        session_start();
                        if (isset($_SESSION['mensagem'])) {
                            echo "<div id='mensagem' style='color: #FFFF00; font-weight: bold;'>" . $_SESSION['mensagem'] . " <span id='contador'>5</span></div>";
                            unset($_SESSION['mensagem']);
                        }
                    ?>
                    <script src="../js/mensagem.js"></script>
                    <label for="nome"><span>*</span>Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu Nome" autofocus="autofocus" required="required" autocomplete="off"/>
                    <br>
                    <label for="email"><span>*</span>Email:</label>
                    <input type="email" id="email" name="email" placeholder="Seu E-mail" required="required" autocomplete="off"/>
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