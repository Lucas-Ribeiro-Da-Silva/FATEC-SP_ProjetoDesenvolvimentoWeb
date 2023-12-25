//mensagem php
var contador = 9;
var contadorElemento = document.getElementById('contador');

var interval = setInterval(function() {
    contador--;
    contadorElemento.textContent = contador;

    if (contador <= 0) {
        clearInterval(interval);
        var mensagem = document.getElementById('mensagem');
        mensagem.style.display = 'none';
    }
}, 1000);