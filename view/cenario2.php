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
    $doenca1 = $row['doenca1'];
    $doenca2 = $row['doenca2'];
}


$query = "SELECT * FROM puzzle natural join cenario2 WHERE idPuzzle = $idPuzzle and paginaPac = $pagina or paginaPac = $paginaArmario";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $pacienteNome = $row['pacienteNome'];
    $pacienteCodigo = $row['pacienteCodigo'];
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
if ($inventario == 1 && $_SESSION['vazio'] == 1)
    echo '<img class="itemInventario" src="../assets/chave.png">';
else if ($inventario == 2 && $_SESSION['vazio'] == 1)
    echo '<img class="itemInventario" src="../assets/cartao.png">';

if ($pagina == 24) {
    echo '<img src="../scenarios/scenario2/corredor.png">';
    echo '<div id="areaClicavelPostit" onclick="salvarTempo(); redirecionarPagina(25,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelLab1" onclick="salvarTempo(); redirecionarPagina(26,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelSala" onclick="salvarTempo(); redirecionarPagina(33,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelPorta" onclick="salvarTempo(); redirecionarPagina(42,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelCorredor2" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></div>';
    if ($inventario == 1) {
        echo '<div id="areaClicavelLab2" onclick="salvarTempo(); atualizarVariavel(0); redirecionarPagina(40,' . $idPuzzle . ');"></div>';
    } else if ($inventario > 0) {
        echo '<div id="areaClicavelLab2" onclick="salvarTempo(); redirecionarPagina(40,' . $idPuzzle . ');"></div>';
    } else {
        echo '<div id="areaClicavelLab2" onclick="exibirMensagem(\'A porta esta trancada\', 3000);"></div>';
    }
} else if ($pagina == 25) {
    echo '<img src="../scenarios/scenario2/postit.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></div>';
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $doenca1 . '</p>';
    echo '</div>';
} else if ($pagina == 26) { //lab1
    echo '<img src="../scenarios/scenario2/lab1.png">';
    echo '<div id="areaClicavellab1-pc" onclick="salvarTempo(); redirecionarPagina(27,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></div>';
} else if ($pagina == 27) { //lab1-pc
    echo '<img src="../scenarios/scenario2/lab1-pc.png">';
    echo '<div id="areaClicavelExame" onclick="salvarTempo(); redirecionarPagina(28,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(26,' . $idPuzzle . ');"></div>';
} else if ($pagina == 28 || $pagina == 29 || $pagina == 30 || $pagina == 31 || $pagina == 32) { //exame
    echo '<img src="../scenarios/scenario2/lab1-pc.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(26,' . $idPuzzle . ');"></div>';
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $exame . " --- " . $pacienteCodigo . '</p>';
    echo '</div>';
    if ($pagina == 28)
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(29,' . $idPuzzle . ');"></div>';
    else if ($pagina == 29) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(28,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(30,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 30) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(29,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(31,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 31) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(30,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(32,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 32)
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(31,' . $idPuzzle . ');"></div>';
} else if ($pagina == 33) { //sala
    echo '<img src="../scenarios/scenario2/sala.png">';
    echo '<div id="areaClicavelSala-pc" onclick="salvarTempo(); redirecionarPagina(34,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></div>';
} else if ($pagina == 34) { //sala-pc
    echo '<img src="../scenarios/scenario2/sala-pc.png">';
    echo '<div id="areaClicavelPaciente" onclick="salvarTempo(); redirecionarPagina(35,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(33,' . $idPuzzle . ');"></div>';
} else if ($pagina == 35 || $pagina == 36 || $pagina == 37 || $pagina == 38 || $pagina == 39) { //paciente
    echo '<img src="../scenarios/scenario2/sala-pc.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(33,' . $idPuzzle . ');"></div>';
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $pacienteNome . " --- " . $pacienteCodigo . '</p>';
    echo '</div>';
    if ($pagina == 35)
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(36,' . $idPuzzle . ');"></div>';
    else if ($pagina == 36) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(35,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(37,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 37) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(36,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(38,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 38) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(37,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(39,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 39)
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(38,' . $idPuzzle . ');"></div>';
} else if ($pagina == 40) { //lab2
    echo '<img src="../scenarios/scenario2/lab2.gif">';
    echo '<div id="areaClicavelCaderno" onclick="salvarTempo(); redirecionarPagina(41,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></div>';
} else if ($pagina == 41) { //lab2-caderno
    echo '<img src="../scenarios/scenario2/lab2-caderno.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(40,' . $idPuzzle . ');"></div>';
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $doenca2 . '</p>';
    echo '</div>';
} else if ($pagina == 42) { //porta
    echo '<img src="../scenarios/scenario2/corredor.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></div>';
} else if ($pagina == 43) { //corredor2
    echo '<img src="../scenarios/scenario2/corredor2.png">';
    echo '<div id="areaClicavelArmarioFechado" onclick="salvarTempo(); redirecionarPagina(44,' . $idPuzzle . ');"></div>';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(24,' . $idPuzzle . ');"></div>';
} else if ($pagina == 44 || $pagina == 45 || $pagina == 46 || $pagina == 47 || $pagina == 48) { //armarioFechado
    echo '<img src="../scenarios/scenario2/armarioFechado.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></div>';
    echo '<div class="question-overlay">';
    echo '<p class="question-text">' . $pacienteNome . '</p>';
    echo '</div>';
?>
    <div class="container-fluid">
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
    if ($pagina == 44)
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(45,' . $idPuzzle . ');"></div>';
    else if ($pagina == 45) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(44,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(46,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 46) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(45,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(47,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 47) {
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(46,' . $idPuzzle . ');"></div>';
        echo '<div id="areaClicavelSetaDireita" onclick="salvarTempo(); redirecionarPagina(48,' . $idPuzzle . ');"></div>';
    } else if ($pagina == 48)
        echo '<div id="areaClicavelSetaEsquerda" onclick="salvarTempo(); redirecionarPagina(47,' . $idPuzzle . ');"></div>';
} else if ($pagina == 49) { //armarioAberto
    echo '<img src="../scenarios/scenario2/armarioAberto.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></div>';
    if ($inventario == 1)
        echo '<img onclick="salvarTempo(); atualizarInventario(); atualizarVariavel(1);" class="itemInventario" src="../assets/cartao.png">';
} else if ($pagina == 50) { //armarioAberto
    echo '<img src="../scenarios/scenario2/armarioAberto.png">';
    echo '<div id="areaClicavelSetaBaixo" onclick="salvarTempo(); redirecionarPagina(43,' . $idPuzzle . ');"></div>';
    if ($inventario == 0)
        echo '<img onclick="salvarTempo(); atualizarInventario(); atualizarVariavel(1);" class="itemInventario" src="../assets/chave.png">';
}

?>