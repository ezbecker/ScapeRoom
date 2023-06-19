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

function redirecionarPagina(pagina, puzzle) {
  const formData = new FormData();
  formData.append('pagina', pagina);
  formData.append('idPuzzle', puzzle);

  fetch('../controller/sessao.php', {
    method: 'POST',
    body: formData
  })
    .then(response => {
      if (response.ok) {
        atualizarConteudo('../view/game.php');
      } else {
        console.log('Erro ao redirecionar a página.');
      }
    })
    .catch(error => console.log(error));
}



  
  
  
  
  