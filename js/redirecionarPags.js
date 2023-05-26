var idPuzzle = idPuzzle;
var idPartida = idPartida;

function redirecionar1() {
    window.location.replace('http://localhost/scaperoom/controller/room1.php');
}

function redirecionar2() {
    window.location.replace('http://localhost/scaperoom/view/ranking.php');
}

function redirecionar3() {
    window.location.replace('http://localhost/scaperoom/controller/sair.php');
}

function redirecionarSeta() {
    var tempoAtual = tempoRestante; 
    fetch('../model/salvarTempo.php?tempo=' + formatarTempo(tempoAtual)+'&idPartida='+idPartida);
    window.location.href = 'http://localhost/scaperoom/view/slides.php?slide=4&idPuzzle=' + idPuzzle;

  }

function redirecionarPerg1() {
    window.location.replace('http://localhost/scaperoom/view/puzzleRoom1.php?idPuzzle=' + idPuzzle);
}

function redirecionarSetaSairRoom1() {
    window.location.replace('http://localhost/scaperoom/controller/cenario1.php');
}