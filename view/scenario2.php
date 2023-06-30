<?php
require_once '../model/scenario2_select_question.php';

$puzzle = searchQuestion_scenario2($conectado, $idPuzzle, $pagina);
$trash = searchTrash_scenario2($conectado, $idPuzzle);
$keyboard = searchKeyboard_scenario2($conectado, $idPuzzle);

if ($pagina == 10) {
    renderImage("../scenarios/scenario1/corridor/corridor1.png");
    renderButton("keyboard-position", "salvarTempo(); redirecionarPagina(312," . $idPuzzle . ")");
    renderButton("room1", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(11," . $idPuzzle . ")");
    renderButton("room2", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(13," . $idPuzzle . ")");
    renderButton("room3", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(16," . $idPuzzle . ")");
    renderButton("room4", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(18," . $idPuzzle . ")");
    renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(9," . $idPuzzle . ")");
} else if ($pagina == 11) { // room1
    renderImage("../scenarios/scenario1/roomOne/roomOne1.gif");
    renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaFecha', false); redirecionarPagina(10," . $idPuzzle . ")");
    renderButton("room1-clipboard", "salvarTempo(); redirecionarPagina(12," . $idPuzzle . ")");
    renderButton("room1-trash", "salvarTempo(); redirecionarPagina(23," . $idPuzzle . ")");
    renderButton("room1-postit", "salvarTempo(); reproduzirAudio('postit', false); redirecionarPagina(311," . $idPuzzle . ")");
} else if ($pagina == 12) { // Prancheta
    renderImage("../scenarios/scenario1/roomOne/Room1Clipboard.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(11," . $idPuzzle . ")");
    exibirClipboard_scenario2($puzzle);
} else if ($pagina == 13) { // room2
    renderImage("../scenarios/scenario1/roomTwo/roomTwo1.png");
    renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaFecha', false); redirecionarPagina(10," . $idPuzzle . ")");
    renderButton("room2-clipboard", "salvarTempo(); redirecionarPagina(14," . $idPuzzle . ")");
    renderButton("room2-paper", "salvarTempo(); reproduzirAudio('postit', false); redirecionarPagina(15," . $idPuzzle . ")");
} else if ($pagina == 14) { // Prancheta
    renderImage("../scenarios/scenario1/roomTwo/Room2Clipboard.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(13," . $idPuzzle . ")");
    exibirClipboard_scenario2($puzzle);
} else if ($pagina == 15) {
    renderImage("../scenarios/scenario1/roomTwo/roomTwo3.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(13," . $idPuzzle . ")");
} else if ($pagina == 16) { // room3
    renderImage("../scenarios/scenario1/roomThree/roomThree1.png");
    renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaFecha', false); redirecionarPagina(10," . $idPuzzle . ")");
    renderButton("room3-clipboard", "salvarTempo(); redirecionarPagina(17," . $idPuzzle . ")");
} else if ($pagina == 17) {  // Prancheta
    renderImage("../scenarios/scenario1/roomThree/Room3Clipboard.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(16," . $idPuzzle . ")");
    exibirClipboard_scenario2($puzzle);
} else if ($pagina == 18) { // room4
    renderImage("../scenarios/scenario1/roomFour/roomFour1.gif");
    renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaFecha', false); redirecionarPagina(10," . $idPuzzle . ")");
    renderButton("room4-drawer", "salvarTempo(); redirecionarPagina(19," . $idPuzzle . ")");
} else if ($pagina == 19) {
    renderImage("../scenarios/scenario1/roomFour/roomFour2.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(18," . $idPuzzle . ")");
    renderButton("room4-clipboard", "salvarTempo(); redirecionarPagina(20," . $idPuzzle . ")");
    renderButton("room4-paper", "salvarTempo(); reproduzirAudio('postit', false); redirecionarPagina(21," . $idPuzzle . ")");
} else if ($pagina == 20) { // Prancheta
    renderImage("../scenarios/scenario1/roomFour/Room4Clipboard.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(19," . $idPuzzle . ")");
    exibirClipboard_scenario2($puzzle);
} else if ($pagina == 21) {
    renderImage("../scenarios/scenario1/roomFour/roomFour4.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(19," . $idPuzzle . ")");
} else if ($pagina == 22) {
    renderImage("../scenarios/scenario1/corridor/corridor2.png");
    renderButton("scenario1-exit", "salvarTempo(); redirecionarSetaSairCenario1();");
} else if ($pagina == 23) { // Lixeira
    echo '<p class="trash-text">A ordem do código do elevador é determinada pela <strong>idade</strong> dos pacientes em ordem <strong>' . $trash['caderno'] . '</strong></p>';
    echo '<img class="image" src="../assets/papel1.png" width="150" height="150" />';
    echo '<img class="image" src="../assets/papel3.png" width="150" height="150" />';
    echo '<img class="image" src="../assets/papel2.png" width="150" height="150" />';
    echo '<img class="image" src="../assets/papel1.png" width="150" height="150" />';
    echo '<img class="image" src="../assets/papel2.png" width="150" height="150" />';
    echo '<img class="image" src="../assets/papel3.png" width="150" height="150" />';
    renderImage("../scenarios/scenario1/roomOne/Room1Trash.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(11," . $idPuzzle . ")");
} else if ($pagina == 311) { //postit
    renderImage("../scenarios/scenario1/roomOne/Room1Postit.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(11," . $idPuzzle . ")");
} else if ($pagina == 312) { //keyboard
    renderImage("../scenarios/scenario1/corridor/puzzleTeclado.png");
    renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(10," . $idPuzzle . ")");
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
<?php
}
?>
<script>
    var asw = "<?php echo $keyboard['resposta']; ?>";
</script>