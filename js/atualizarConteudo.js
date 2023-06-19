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
  
          // Remove os scripts existentes
          const existingScripts = document.getElementsByTagName('script');
          for (let i = 0; i < existingScripts.length; i++) {
            existingScripts[i].parentNode.removeChild(existingScripts[i]);
          }
  
          // Adiciona os novos scripts
          for (let i = 0; i < newScripts.length; i++) {
            const script = document.createElement('script');
            if (newScripts[i].src) {
              script.src = newScripts[i].src;
            } else {
              script.innerHTML = newScripts[i].innerHTML;
            }
            document.body.appendChild(script);
          }
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
