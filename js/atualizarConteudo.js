
function salvarTempo() {
    var tempoAtual = tempoRestante;
    fetch('../model/salvarTempo.php?tempo=' + formatarTempo(tempoAtual) + '&idPartida=' + idPartida)
        .catch(error => console.log(error));
}

function atualizarConteudo(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.documentElement.innerHTML = data;
            var scriptElements = document.getElementsByTagName('script');
            for (var i = 0; i < scriptElements.length; i++) {
                if (scriptElements[i].src !== '../js/cronometro.js') {
                    eval(scriptElements[i].innerHTML);
                }
            }
        })
        .catch(error => console.log(error));
}