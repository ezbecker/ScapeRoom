<!DOCTYPE html>
<html>

<head>
  <title>Puzzle do Teclado</title>
  <style type="text/css">
    .container {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      width: 300px;
      margin: 0 auto;
      padding: 10px;
    }

    .button {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 60px;
      height: 60px;
      margin: 10px;
      font-size: 24px;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      background-color: #e0e0e0;
    }

    .active {
      background-color: #b2dfdb;
    }

    .success {
      background-color: #81c784;
    }

    .error {
      background-color: #e57373;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="button" data-symbol="1">1</div>
    <div class="button" data-symbol="2">2</div>
    <div class="button" data-symbol="3">3</div>
    <div class="button" data-symbol="4">4</div>
  </div>

  <script type="text/javascript">
    const code = ['2', '4', '1', '3'];
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
      }, 1000);
    }

    function checkInput() {
      if (currentInput.length < code.length || reseting) {
        return;
      }

      if (currentInput === code.join('')) {
        console.log('Código correto!');
        const buttons = document.querySelectorAll('.button');
        for (let i = 0; i < buttons.length; i++) {
          buttons[i].classList.add('success');
        }
      } else {
        console.log('Código incorreto!');
        const buttons = document.querySelectorAll('.button');
        for (let i = 0; i < buttons.length; i++) {
          buttons[i].classList.add('error');
        }
        setTimeout(resetButtons, 1000);
      }

      currentInput = '';
    }

    document.addEventListener('DOMContentLoaded', function() {
      const buttons = document.querySelectorAll('.button');
      for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
          const symbol = this.getAttribute('data-symbol');
          if (reseting) return;
          this.classList.add('active');
          currentInput += symbol;
          checkInput();
        });
      }
    });
  </script>
</body>

</html>