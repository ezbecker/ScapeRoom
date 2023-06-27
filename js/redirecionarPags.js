function redirecionar1() {
    window.location.replace('../controller/room1.php');
}

function redirecionarSair() {
    window.location.replace('../controller/sair.php');
}

function redirecionarPerg1() {
    window.location.replace('../view/puzzleRoom1.php?idPuzzle=' + idPuzzle);
}

function redirecionarSetaSairRoom1() {
    window.location.replace('../controller/cenario1.php');
}

function redirecionarSetaSairCenario1() {
    window.location.replace('../controller/cenario2.php');
}

function redirecionarTeclado() {
    window.location.replace('../view/puzzleTeclado.php?idPuzzle=' + idPuzzle);
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



  
  
  
  
  