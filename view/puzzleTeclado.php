<!DOCTYPE html>
<html>
<?php

$query = "SELECT * FROM puzzle WHERE idPuzzle =" . $idPuzzle;
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  $respostaTeclado = $row["resposta"];
  $linkTeclado = $row["link"];
}
?>

<head>
  <link rel="stylesheet" href="css/puzzleTeclado.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/frame.css">
</head>

<body>

  <img src="../scenarios/scenario1/corridor/puzzleTeclado.png">
  <?php
  echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(10)"></div>';
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

  <script type="text/javascript">
    const link = "<?php echo $linkTeclado; ?>";
    const resposta = "<?php echo $respostaTeclado; ?>";
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
        window.location.href = 'http://localhost/scaperoom/controller/redirecionarRespCorreta.php?link=' + encodeURIComponent(link);
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