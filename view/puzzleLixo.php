<!DOCTYPE html>
<html>

<head>
    <title>Lixeira</title>
    <link rel="stylesheet" href="css/puzzleLixo.css">

    <?php
    require_once "../controller/userAutenticado.php";

    require_once "../model/pegarIdUsuario.php";

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
    ?>
    <script>
        window.onbeforeunload = function() {
            salvarTempo();
        };
    </script>
    <link rel="stylesheet" href="css/game.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/areasClicaveis.css">
</head>

<body>
    <div class="data">
        <div class="playing">
            <h1>Jogando</h1>
            <p><?php echo $nome; ?></p>
        </div>

        <div class="goal">
            <h1>Objetivo atual</h1>
            <p>Saia do quarto</p>
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

    <img class="image" src="../assets/bilhete.png" width="305" height="104" />
    <img class="image" src="../assets/papel1.png" width="150" height="150" />
    <img class="image" src="../assets/papel3.png" width="150" height="150" />
    <img class="image" src="../assets/papel2.png" width="150" height="150" />
    <img class="image" src="../assets/papel1.png" width="150" height="150" />
    <img class="image" src="../assets/papel2.png" width="150" height="150" />
    <img class="image" src="../assets/papel3.png" width="150" height="150" />

    <script type="text/javascript">
        const images = document.querySelectorAll('.image');
        let offsetX = 0;
        let offsetY = 0;

        images.forEach(image => {
            let selected = false;
            image.addEventListener('mousedown', (event) => {
                selected = !selected;
                image.classList.toggle('selected', selected);
                offsetX = event.clientX - image.offsetLeft;
                offsetY = event.clientY - image.offsetTop;
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
    </script>
</body>

</html>
<script>
    var idPuzzle = <?php echo $idPuzzle; ?>;
    var idPartida = <?php echo $idPartida; ?>;
</script>
<script src="../js/atualizarConteudo.js"></script>
<script src="../js/cronometro.js"></script>
<script src="../js/redirecionarPags.js"></script>