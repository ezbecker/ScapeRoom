var idPuzzle = idPuzzle;
var idPartida = idPartida;

function aplicarEstilos(areaId, width, height, left, top) {
    var area = document.getElementById(areaId);
    if (area) {
      area.style.position = 'absolute';
      area.style.width = width;
      area.style.height = height;
      area.style.left = left;
      area.style.top = top;
      area.style.cursor = 'pointer';
      area.style.backgroundColor = 'rgb(179, 44, 44)';
    }
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

function redirecionarPerg1() {
    window.location.replace('http://localhost/scaperoom/view/puzzleRoom1.php?idPuzzle=' + idPuzzle);
}

function redirecionarSetaSairRoom1() {
    window.location.replace('http://localhost/scaperoom/controller/cenario1.php');
}

function redirecionarSetaSairCenario1() {
    window.location.replace('http://localhost/scaperoom/controller/cenario2.php');
}

function redirecionarLixo() {
    window.location.replace('http://localhost/scaperoom/view/puzzleLixo.php');
}

function redirecionarTeclado() {
    window.location.replace('http://localhost/scaperoom/view/puzzleTeclado.php?idPuzzle=' + idPuzzle);
}

function redirecionarPagina(pagina) {
    var url = 'http://localhost/scaperoom/view/game.php?pagina=' + pagina + '&idPuzzle=' + idPuzzle;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.documentElement.innerHTML = data;
            var scriptElements = document.getElementsByTagName('script');
            for (var i = 0; i < scriptElements.length; i++) {
                eval(scriptElements[i].innerHTML);
            }
        })
        .catch(error => console.log(error));
}