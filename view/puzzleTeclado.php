<!DOCTYPE html>
<html>
<?php
session_start();

require_once "../model/conexao.php";
$query = "SELECT * FROM usuario WHERE email = '$email'";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  $idUsuario = $row["idUsuario"];
  $nome = $row["nome"];
}

$idPuzzle = $_GET["idPuzzle"];
$query = "SELECT * FROM partida WHERE idUsuario = $idUsuario ORDER BY idPartida DESC LIMIT 1";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$tempo = $row["tempo"];
$idPartida = $row["idPartida"];
$totalSegundos = array_reduce(explode(':', $tempo), function ($total, $tempo) {
  return $total * 60 + $tempo;
}, 0);

$query = "SELECT * FROM puzzle WHERE idPuzzle =" . $idPuzzle;
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  $resposta = $row["resposta"];
}
?>

<head>
  <title>Puzzle do Teclado</title>
  <script>
    window.onbeforeunload = function() {
      salvarTempo();
    };
  </script>
  <link rel="stylesheet" href="css/puzzleTeclado.css">
  <link rel="stylesheet" href="css/game.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/areasClicaveis.css">
  <link rel="stylesheet" href="css/frame.css">
</head>

<body>
  <div class="data">
    <div class="playing">
      <h1>Jogando</h1>
      <p><?php echo $nome; ?></p>
    </div>

    <div class="goal">
      <h1>Objetivo atual</h1>
      <p>Descubra o código do elevador</p>
    </div>

    <div class="time">
      <h1>Tempo total restante</h1>
      <?php
      echo '<p id="cronometro"></p>'
      ?>
    </div>
  </div>

  <script>
    var tempoRestante = <?php echo $totalSegundos; ?>;
  </script>

  <div class="iframe-container" id="content">
    <img src="../scenarios/scenario1/corridor/puzzleTeclado.png">
    <?php
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10,' . $idPuzzle . ')"></div>';
    ?>
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
  </div>

  <script type="text/javascript">
    const idPuzzle = "<?php echo $idPuzzle; ?>";
    const resposta = "<?php echo $resposta; ?>";
    const code = resposta.split('');
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
        salvarTempo();
        redirecionarPagina(22, idPuzzle);
      } else {
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
<script>
  var idPartida = <?php echo $idPartida; ?>;
</script>
<script src="../js/atualizarConteudo.js"></script>
<script src="../js/cronometro.js"></script>
<script src="../js/redirecionarPags.js"></script>