var idPuzzle = idPuzzle;
var idPartida = idPartida;

function salvarTempo() {
    var tempoAtual = tempoRestante; 
    fetch('../model/salvarTempo.php?tempo=' + formatarTempo(tempoAtual)+'&idPartida='+idPartida);
}

function definirPosicao(areaId, largura, altura, esquerda, topo) {
    var area = document.getElementById(areaId);
    area.style.width = largura;
    area.style.height = altura;
    area.style.left = esquerda;
    area.style.top = topo;
  }

function redirecionar1() {
    window.location.replace('http://localhost/scaperoom/controller/room1.php');
}

function redirecionar2() {
    window.location.replace('http://localhost/scaperoom/view/ranking.php');
}

function redirecionar3() {
    window.location.replace('http://localhost/scaperoom/controller/sair.php');
}

function redirecionarSlide(slide) {
    window.location.href = 'http://localhost/scaperoom/view/slides.php?slide='+ slide + '&idPuzzle=' + idPuzzle;
}

function redirecionarPerg1() {
    window.location.replace('http://localhost/scaperoom/view/puzzleRoom1.php?idPuzzle=' + idPuzzle);
}

function redirecionarSetaSairRoom1() {
    window.location.replace('http://localhost/scaperoom/controller/cenario1.php');
}