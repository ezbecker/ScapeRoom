function salvarTempo() {
    const tempoAtual = tempoRestante;
    const formData = new FormData();
    formData.append('tempo', formatarTempo(tempoAtual));
    formData.append('idPartida', idPartida);
  
    fetch('../model/salvarTempo.php', {
      method: 'POST',
      body: formData
    })
      .catch(error => console.log(error));
  }

  function attachDragEvents() {
    const images = document.querySelectorAll('.image');
    let zIndexCounter = 1;
    let offsetX = 0;
    let offsetY = 0;

    images.forEach(image => {
        let selected = false;
        image.addEventListener('mousedown', (event) => {
            selected = !selected;
            image.classList.toggle('selected', selected);
            offsetX = event.clientX - image.offsetLeft;
            offsetY = event.clientY - image.offsetTop;
            image.style.zIndex = zIndexCounter++;
        });
        image.addEventListener('mousemove', (event) => {
            if (selected) {
                image.style.left = (event.clientX - offsetX) + 'px';
                image.style.top = (event.clientY - offsetY) + 'px';
            }
        });
        image.addEventListener('mouseup', () => {
            dragging = false;
        });
    });
}


  function atualizarConteudo(url) {
    fetch(url)
      .then(response => response.text())
      .then(data => {
        const parser = new DOMParser();
        const newDocument = parser.parseFromString(data, 'text/html');
        const contentElement = newDocument.getElementById('content');
  
        if (contentElement) {
          document.getElementById('content').innerHTML = contentElement.innerHTML;
  
          const newScripts = contentElement.getElementsByTagName('script');
  
          const existingScripts = document.getElementsByTagName('script');
          for (let i = 0; i < existingScripts.length; i++) {
            existingScripts[i].parentNode.removeChild(existingScripts[i]);
          }
  
          for (let i = 0; i < newScripts.length; i++) {
            const script = document.createElement('script');
            if (newScripts[i].src) {
              script.src = newScripts[i].src;
            } else {
              script.innerHTML = newScripts[i].innerHTML;
            }
            document.body.appendChild(script);
          }
          attachDragEvents();
        } else {
          console.log('Elemento de conteúdo não encontrado na resposta.');
        }
      })
      .catch(error => console.log(error));
  }
  
  function exibirMensagem(texto, tempo) {
    var mensagemDiv = document.getElementById('mensagem');
    mensagemDiv.innerText = texto;
    mensagemDiv.style.display = 'block';

    setTimeout(function() {
        mensagemDiv.innerText = '';
        mensagemDiv.style.display = 'none';
    }, tempo);
}

function atualizarInventario() {

  let formData = new FormData();
  formData.append('idPartida', idPartida);
  formData.append('inventario', inventario);
  
  fetch('../model/update_inventory.php', {
    method: 'POST',
    body: formData
  })
    .then(response => {
      if (response.ok) {
        location.reload();
      } else {
        throw new Error('Erro ao atualizar o inventário.');
      }
    })
    .catch(error => console.log(error));
}

function atualizarVariavel(vazio) {
  let formData = new FormData();
  formData.append('vazio', vazio);
  
  fetch('../controller/update_empty_inventory.php', {
    method: 'POST',
    body: formData
  })
    .then(response => {
      if (response.ok) {
        location.reload();
      } else {
        throw new Error('Erro ao atualizar o inventário.');
      }
    })
    .catch(error => console.log(error));
}

function fimGame(idPartida) {
  let formData = new FormData();
  formData.append('idPartida', idPartida);
  
  fetch('../model/fimGame.php', {
    method: 'POST',
    body: formData
  })
    .then(response => {
      if (response.ok) {a
        location.reload();
      } else {
        throw new Error('Erro ao atualizar o inventário.');
      }
    })
    .catch(error => console.log(error));
}

var audioFundoAtual;

function reproduzirAudio(idAudio, fundo = false) {
  var audio = document.getElementById(idAudio);

  if (fundo) {
    if (audioFundoAtual) {
      pararAudioFundo();
    }
    audio.loop = true;
    audioFundoAtual = audio;
  } else {
    audio.currentTime = 0;
    audio.loop = false;
  }

  audio.play();
}

function pararAudioFundo() {
  if (audioFundoAtual) {
    audioFundoAtual.pause();
    audioFundoAtual.currentTime = 0;
    audioFundoAtual = null;
  }
}
