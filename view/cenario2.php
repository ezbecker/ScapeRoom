<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Execução do cenário 1 do jogo RadioEscape">
        <meta name="keywords" content="scaperoom, radiologia, saúde, jogo, radioescape, radio escape,">
        <link rel="icon" href="../assets/icon.png">
        <title>RadioEscape | Jogando</title>
        <link rel="stylesheet" href="game.css">
        <link rel="stylesheet" href="default-positions.css">
        <link rel="stylesheet" href="css/second-scenario.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    </head>

<?php
$paginaArmario = 0;
if ($pagina == 44)
    $paginaArmario = 35;
else if ($pagina == 45)
    $paginaArmario = 36;
else if ($pagina == 46)
    $paginaArmario = 37;
else if ($pagina == 47)
    $paginaArmario = 38;
else if ($pagina == 48)
    $paginaArmario = 39;

$query = "SELECT * FROM puzzle WHERE idPuzzle = $idPuzzle";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $postit = $row['postit'];
    $caderno = $row['caderno'];
}

$query = "SELECT * FROM puzzle natural join cenario2 natural join `cenario2-pacientes`  WHERE idPuzzle = $idPuzzle and paginaPac = $pagina or paginaPac = $paginaArmario";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $pacienteNome = $row['pacienteNome'];
    $idade = $row['idade'];
    $genero = $row['genero'];
    $caso = $row['caso'];
}

$query = "SELECT * FROM puzzle natural join cenario2 WHERE idPuzzle = $idPuzzle and paginaExame = $pagina";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result2 = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result2) === 1) {
    $row = mysqli_fetch_assoc($result2);
    $exame = $row['exame'];
    $pacienteCodigo = $row['pacienteCodigo'];
}
if ($pagina != 1 && $pagina != 51 && $pagina != 333 && $pagina != 2 && $inventario == 1 && $_SESSION['vazio'] == 1)
    echo '<img class="item-scenario" src="../assets/chave.png">';
else if ($pagina != 1 && $pagina != 51 && $pagina != 333 && $pagina != 2 && $inventario == 2 && $_SESSION['vazio'] == 1)
    echo '<img class="item-scenario" src="../assets/cartao.png">';

if ($pagina == 24) {
    echo '<img src="../scenarios/scenario2/corredor.png">';
    echo '<button class="postit-position" onclick="salvarTempo(); redirecionarPagina(25,' . $idPuzzle . ');"></button>';
    echo '<button class="lab1" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); redirecionarPagina(26,' . $idPuzzle . ');"></button>';
    echo '<button class="room" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); redirecionarPagina(33,' . $idPuzzle . ');"></button>';
    echo '<button class="door" onclick="salvarTempo(); redirecionarPagina(42,' . $idPuzzle . ');"></button>';
    echo '<button class="corridor2" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></button>';
    if ($inventario == 1) {
        echo '<button class="lab2" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); atualizarVariavel(0); redirecionarPagina(40,' . $idPuzzle . ');"></button>';
    } else if ($inventario > 0) {
        echo '<button class="lab2" onclick="salvarTempo(); reproduzirAudio(\'portaAbre\', false); redirecionarPagina(40,' . $idPuzzle . ');"></button>';
    } else {
        echo '<button class="lab2" onclick="exibirMensagem(\'<p class=locked-message>A porta esta trancada</p>\', 3000);"></button>';
    }
} else if ($pagina == 25) {
    echo '<img src="../scenarios/scenario2/postit.png">';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></button>';
    echo '<p class="disease">' . $postit . '</p>';
} else if ($pagina == 26) { //lab1
    echo '<img src="../scenarios/scenario2/lab1.png">';
    echo '<button class="lab1-pc" onclick="salvarTempo(); reproduzirAudio(\'pcLigando\', false); redirecionarPagina(27,' . $idPuzzle . ');"></button>';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaFecha\', false); redirecionarPagina(24,' . $idPuzzle . ');"></div>';
} else if ($pagina == 27) { //lab1-pc
    echo '<img src="../scenarios/scenario2/lab1-pc.png">';
    echo '<button class="pc-folder" onclick="salvarTempo(); redirecionarPagina(28,' . $idPuzzle . ');"></button>';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(26,' . $idPuzzle . ');"></button>';
} else if ($pagina == 28 || $pagina == 29 || $pagina == 30 || $pagina == 31 || $pagina == 32) { //exame
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(26,' . $idPuzzle . ');"></button>';
    if ($pagina == 28) {
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(29,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/lab1-pc-w-1.png">';
    } else if ($pagina == 29) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(28,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(30,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/lab1-pc-w-2.png">';
    } else if ($pagina == 30) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(29,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(31,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/lab1-pc-w-2.png">';
    } else if ($pagina == 31) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(30,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(32,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/lab1-pc-w-2.png">';
    } else if ($pagina == 32) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(31,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/lab1-pc-w-3.png">';
    }
    echo '<p class="code-exam">' . $pacienteCodigo . '</p>';
    echo '  <img class="exam" src="../assets/exames/fraturas/' . $exame . '">';
} else if ($pagina == 33) { //sala
    echo '<img src="../scenarios/scenario2/sala.png">';
    echo '<button class="room-pc" onclick="salvarTempo(); reproduzirAudio(\'pcLigando\', false); redirecionarPagina(34,' . $idPuzzle . ');"></button>';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaFecha\', false); redirecionarPagina(24,' . $idPuzzle . ');"></button>';
} else if ($pagina == 34) { //sala-pc
    echo '<img src="../scenarios/scenario2/sala-pc.png">';
    echo '<button class="pc-folder" onclick="salvarTempo(); redirecionarPagina(35,' . $idPuzzle . ');"></button>';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(33,' . $idPuzzle . ');"></button>';
} else if ($pagina == 35 || $pagina == 36 || $pagina == 37 || $pagina == 38 || $pagina == 39) { //paciente
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(33,' . $idPuzzle . ');"></button>';
    if ($pagina == 35) {
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(36,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/sala-pc-w-1.png">';
    } else if ($pagina == 36) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(35,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(37,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/sala-pc-w-2.png">';
    } else if ($pagina == 37) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(36,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(38,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/sala-pc-w-2.png">';
    } else if ($pagina == 38) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(37,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(39,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/sala-pc-w-2.png">';
    } else if ($pagina == 39) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(38,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/sala-pc-w-3.png">';
    }
    echo '<div class="patient-data">';
    echo '<p class="patient-name">' . $pacienteNome . '</p>';
    echo '<p class="patient-age">' . $idade . '</p>';
    echo '<p class="patient-gender">' . $genero . '</p>';
    echo '<p class="patient-case">' . $caso . '</p>';
    echo '</div>';
} else if ($pagina == 40) { //lab2
    echo '<img src="../scenarios/scenario2/lab2.gif">';
    echo '<div id="areaClicavelCaderno" onclick="salvarTempo(); redirecionarPagina(41,' . $idPuzzle . ');"></div>';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); reproduzirAudio(\'portaFecha\', false); redirecionarPagina(24,' . $idPuzzle . ');"></button>';
} else if ($pagina == 41) { //lab2-caderno
    echo '<img src="../scenarios/scenario2/lab2-caderno.png">';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(40,' . $idPuzzle . ');"></button>';
    echo '<p class="question-text">' . $caderno . '</p>';
} else if ($pagina == 42) { //cartao
    echo '<img src="../scenarios/scenario2/terminalCartao.png">';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></button>';
    if ($inventario == 2) {
        echo '<div id="areaClicavelLab1" onclick="salvarTempo(); atualizarVariavel(0); fimGame(' . $idPartida . '); redirecionarPagina(51,' . $idPuzzle . ');"></div>';
    } else {
        echo '<div id="areaClicavelLab1" onclick="exibirMensagem(\'Cartão necessário\', 3000);"></div>';
    }
} else if ($pagina == 43) { //corredor2
    echo '<img src="../scenarios/scenario2/corredor2.png">';
    echo '<button class="closed-locker" onclick="salvarTempo(); redirecionarPagina(44,' . $idPuzzle . ');"></button>';
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></button>';
} else if ($pagina == 44 || $pagina == 45 || $pagina == 46 || $pagina == 47 || $pagina == 48) { //armarioFechado
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></button>';
    if ($pagina == 44) {
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(45,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/armarioFechado-1.png">';
    } else if ($pagina == 45) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(44,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(46,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/armarioFechado-2.png">';
    } else if ($pagina == 46) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(45,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(47,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/armarioFechado-2.png">';
    } else if ($pagina == 47) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(46,' . $idPuzzle . ');"></button>';
        echo '<button class="right-arrow-position" onclick="salvarTempo(); redirecionarPagina(48,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/armarioFechado-2.png">';
    } else if ($pagina == 48) {
        echo '<button class="left-arrow-position" onclick="salvarTempo(); redirecionarPagina(47,' . $idPuzzle . ');"></button>';
        echo '<img src="../scenarios/scenario2/armarioFechado-3.png">';
    }
    echo '<p class="locker-name">' . $pacienteNome . '</p>';
?>
    <div class="terminal-input">
        <form action="../controller/respPuzzleArmario.php" method="POST">
            <div class="nomeTextField">
                <input type="text" name="respUser" class="form-control" placeholder="Resposta" required>
            </div>
            <input type="hidden" name="idPuzzle" id="idPuzzle" value="<?php echo $idPuzzle ?>">
            <input type="hidden" name="paginaArmario" id="idPuzzle" value="<?php echo $paginaArmario ?>">
            <button type="submit" class="enviar">Enviar</button>
        </form>
    </div>
<?php
} else if ($pagina == 49) { //armarioAberto
    echo '<img src="../scenarios/scenario2/armarioAberto.png">';
?>
    <script>
        window.onload = function() {
            reproduzirAudio('chuvaJogo', true);
            if (inventario < 2)
                reproduzirAudio('armarioAberto', false);
        };
    </script>
<?php
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></button>';
    if ($inventario == 1)
        echo '<img onclick="salvarTempo(); atualizarInventario(); atualizarVariavel(1);" class="item-inventory" src="../assets/cartao.png">';
} else if ($pagina == 50) { //armarioAberto
    echo '<img src="../scenarios/scenario2/armarioAberto.png">';
?>
    <script>
        window.onload = function() {
            reproduzirAudio('chuvaJogo', true);
            if (inventario < 1)
                reproduzirAudio('armarioAberto', false);
        };
    </script>
<?php
    echo '<button class="down-arrow-position" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></button>';
    if ($inventario == 0)
        echo '<img onclick="salvarTempo(); atualizarInventario(); atualizarVariavel(1);" class="item-inventory" src="../assets/chave.png">';
} else if ($pagina == 51) {
    echo '<p>Parabéns ' . $nome . ' você terminou em ' . $tempo . '</p>';
    echo '<button class="down-arrow-position" onclick="redirecionarPagina(1,0);"></button>';
}

?>