
const code = asw.split('');
let currentInput = '';
let reseting = false;
function resetButtons() {
    reseting = true;
    const buttons = document.querySelectorAll('.button');
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('active', 'success', 'error');
    }
    setTimeout(() => {
        reseting = false;
    }, 500);
}

function checkInput() {
    if (currentInput.length < code.length || reseting) {
        return;
    }

    if (currentInput === code.join('')) {
        const buttons = document.querySelectorAll('.button');
        for (let i = 0; i < buttons.length; i++) {
            buttons[i].classList.add('success');
        }
        salvarTempo();
        reproduzirAudio('tecladoCorreto', false);
        redirecionarPagina(22, idPuzzle);
    } else {
        reproduzirAudio('tecladoErrado', false);
        const buttons = document.querySelectorAll('.button');
        for (let i = 0; i < buttons.length; i++) {
            buttons[i].classList.add('error');
        }
        setTimeout(resetButtons, 1000);
    }

    currentInput = '';
}

function initializeKeyboard() {
    const buttons = document.querySelectorAll('.button');
    for (let i = 0; i < buttons.length; i++) {
      buttons[i].addEventListener('click', function() {
        const symbol = this.getAttribute('data-symbol');
        if (reseting) return;
        this.classList.add('active');
        currentInput += symbol;
        reproduzirAudio('teclado', false);
        checkInput();
      });
    }
  }
  