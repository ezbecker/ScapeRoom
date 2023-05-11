<!DOCTYPE html>
<html>
<?php
require_once "../model/conexao.php";
$idPergunta = $_GET["idPergunta"];
$query = "SELECT * FROM perguntas WHERE idPergunta =" . $idPergunta;
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  $resposta = $row["resposta"];
} else {
  //colocar isso para voltar para o quarto
  header("Location: ../view/login.php?erro=credenciais");
  exit();
}
?>

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
    <div class="button" data-symbol="1">Θ</div>
    <div class="button" data-symbol="2">ψ</div>
    <div class="button" data-symbol="3">Δ</div>
    <div class="button" data-symbol="4">δ</div>
    <div class="button" data-symbol="5">λ</div>
    <div class="button" data-symbol="6">μ</div>
    <div class="button" data-symbol="7">Ω</div>
    <div class="button" data-symbol="8">Φ</div>
    <div class="button" data-symbol="9">η</div>
  </div>

  <script type="text/javascript">
    const resposta = "<?php echo $resposta; ?>"; // Adiciona a resposta do PHP ao JavaScript
    const code = resposta.split(''); // Converte a resposta em um array de caracteres
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