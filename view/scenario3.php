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

require_once '../model/scenario3_select_question.php';

$postit_caderno = searchQuestion_scenario3($conectado, $idPuzzle, $pagina);
$patient_exam = searchExam_scenario3($conectado, $idPuzzle, $pagina);
$patient = searchPatient_scenario3($conectado, $idPuzzle, $pagina, $paginaArmario);

if ($pagina != 1 && $pagina != 51 && $pagina != 333 && $pagina != 2 && $pagina != 52 && $inventory == 1 && $_SESSION['vazio'] == 1)
    echo '<img class="item-scenario" src="../assets/chave.png">';
else if ($pagina != 1 && $pagina != 51 && $pagina != 333 && $pagina != 2 && $pagina != 52 && $inventory == 2 && $_SESSION['vazio'] == 1)
    echo '<img class="item-scenario" src="../assets/cartao.png">';

switch ($pagina) {
    case 24:
        renderImage("../scenarios/scenario2/corredor.png");
        renderButton("postit-position", "salvarTempo(); reproduzirAudio('postit', false); redirecionarPagina(25," . $idPuzzle . ");");
        renderButton("lab1", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(26," . $idPuzzle . ");");
        renderButton("room", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(33," . $idPuzzle . ");");
        renderButton("door", "salvarTempo(); redirecionarPagina(42," . $idPuzzle . ");");
        renderButton("corridor2", "salvarTempo(); redirecionarPagina(43," . $idPuzzle . ");");

        if ($inventory == 1) {
            renderButton("lab2", "salvarTempo(); reproduzirAudio('portaAbre', false); atualizarVariavel(0); redirecionarPagina(40," . $idPuzzle . ");");
        } else if ($inventory > 0) {
            renderButton("lab2", "salvarTempo(); reproduzirAudio('portaAbre', false); redirecionarPagina(40," . $idPuzzle . ");");
        } else {
            renderButton("lab2", "exibirMensagem('A porta esta trancada', 3000);");
        }
        break;
    case 25:
        renderImage("../scenarios/scenario2/postit.png");
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(24," . $idPuzzle . ");");
        echo '<p class="disease"> A chave do laboratório está no armário do paciente com ' . $postit_caderno['postit'] . '. A senha é o código desse paciente.</p>';
        break;
    case 26: //lab1
        renderImage("../scenarios/scenario2/lab1.png");
        renderButton("lab1-pc", "salvarTempo(); reproduzirAudio('pcLigando', false); redirecionarPagina(27," . $idPuzzle . ");");
        renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaFecha', false); redirecionarPagina(24," . $idPuzzle . ");");
        break;
    case 27: //lab1-pc
        renderImage("../scenarios/scenario2/lab1-pc.png");
        renderButton("pc-folder", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(28," . $idPuzzle . ");");
        renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('pcLigando', false); redirecionarPagina(26," . $idPuzzle . ");");
        break;
    case 28:
    case 29:
    case 30:
    case 31:
    case 32: //exame
        renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('pcLigando', false); redirecionarPagina(26," . $idPuzzle . ");");
        if ($pagina == 28) {
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(29," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/lab1-pc-w-1.png");
        } else if ($pagina == 29) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(28," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(30," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/lab1-pc-w-2.png");
        } else if ($pagina == 30) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(29," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(31," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/lab1-pc-w-2.png");
        } else if ($pagina == 31) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(30," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(32," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/lab1-pc-w-2.png");
        } else if ($pagina == 32) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(31," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/lab1-pc-w-3.png");
        }
        echo '<p class="code-exam">' . $patient_exam['pacienteCodigo'] . '</p>';
        echo ' <img class="exam" src="../assets/exames/fraturas/' . $patient_exam['exame'] . '">';
        break;
    case 33: //sala
        renderImage("../scenarios/scenario2/sala.png");
        renderButton("room-pc", "salvarTempo(); reproduzirAudio('pcLigando', false); redirecionarPagina(34," . $idPuzzle . ");");
        renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaFecha', false); redirecionarPagina(24," . $idPuzzle . ");");
        break;
    case 34: //sala-pc
        renderImage("../scenarios/scenario2/sala-pc.png");
        renderButton("pc-folder", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(35," . $idPuzzle . ");");
        renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('pcLigando', false); redirecionarPagina(33," . $idPuzzle . ");");
        break;
    case 35:
    case 36:
    case 37:
    case 38:
    case 39: //paciente
        renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('pcLigando', false); redirecionarPagina(33," . $idPuzzle . ");");
        if ($pagina == 35) {
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(36," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/sala-pc-w-1.png");
        } else if ($pagina == 36) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(35," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(37," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/sala-pc-w-2.png");
        } else if ($pagina == 37) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(36," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(38," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/sala-pc-w-2.png");
        } else if ($pagina == 38) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(37," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(39," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/sala-pc-w-2.png");
        } else if ($pagina == 39) {
            renderButton("left-arrow-position", "salvarTempo(); reproduzirAudio('mouseClick', false); redirecionarPagina(38," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/sala-pc-w-3.png");
        }
        echo '<div class="patient-data">';
        echo '<p class="patient-name">' . $patient['pacienteNome'] . '</p>';
        echo '<p class="patient-age">' . $patient['idade'] . '</p>';
        echo '<p class="patient-gender">' . $patient['genero'] . '</p>';
        echo '<p class="patient-case">' . $patient['pacienteNome'] . '</p>';
        echo '</div>';
        break;
    case 40: //lab2
        renderImage("../scenarios/scenario2/lab2.gif");
        renderButton("notebook-position", "salvarTempo(); redirecionarPagina(41," . $idPuzzle . ");");
        renderButton("down-arrow-position", "salvarTempo(); reproduzirAudio('portaFecha', false); redirecionarPagina(24," . $idPuzzle . ");");
        break;
    case 41: //lab2-caderno
        renderImage("../scenarios/scenario2/lab2-caderno.png");
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(40," . $idPuzzle . ");");
        echo '<p class="notebook-text">O cartão de acesso está no armário do paciente com ' . $postit_caderno['caderno'] . '.</p>';
        break;
    case 42: //cartao
        renderImage("../scenarios/scenario2/terminalCartao.png");
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(24," . $idPuzzle . ");");
        if ($inventory == 2) {
            renderButton("cardDevice", "salvarTempo(); atualizarVariavel(0); fimGame(" . $idPartida . "); redirecionarPagina(51," . $idPuzzle . "); location.reload();");
        } else {
            renderButton("cardDevice", "exibirMensagem('Cartão necessário', 3000);");
        }
        break;
    case 43: //corredor2
        renderImage("../scenarios/scenario2/corredor2.png");
        renderButton("closed-locker", "salvarTempo(); redirecionarPagina(44," . $idPuzzle . ");");
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(24," . $idPuzzle . ");");
        break;
    case 44:
    case 45:
    case 46:
    case 47:
    case 48: //armarioFechado
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(43," . $idPuzzle . ");");
        if ($pagina == 44) {
            renderButton("right-arrow-position", "salvarTempo(); redirecionarPagina(45," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/armarioFechado-1.png");
        } else if ($pagina == 45) {
            renderButton("left-arrow-position", "salvarTempo(); redirecionarPagina(44," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); redirecionarPagina(46," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/armarioFechado-2.png");
        } else if ($pagina == 46) {
            renderButton("left-arrow-position", "salvarTempo(); redirecionarPagina(45," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); redirecionarPagina(47," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/armarioFechado-2.png");
        } else if ($pagina == 47) {
            renderButton("left-arrow-position", "salvarTempo(); redirecionarPagina(46," . $idPuzzle . ");");
            renderButton("right-arrow-position", "salvarTempo(); redirecionarPagina(48," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/armarioFechado-2.png");
        } else if ($pagina == 48) {
            renderButton("left-arrow-position", "salvarTempo(); redirecionarPagina(47," . $idPuzzle . ");");
            renderImage("../scenarios/scenario2/armarioFechado-3.png");
        }
        echo '<p class="locker-name">' . $patient['pacienteNome'] . '</p>';
        echo '<div class="terminal-input">';
        echo '<form action="../controller/answer_closet_scenario3.php" method="POST">';
        echo '<div class="nomeTextField">';
        echo '<input type="text" name="respUser" class="form-control" placeholder="Resposta" required>';
        echo '</div>';
        echo '<input type="hidden" name="idPuzzle" id="idPuzzle" value="' . $idPuzzle . '">';
        echo '<input type="hidden" name="paginaArmario" id="idPuzzle" value="' . $paginaArmario . '">';
        echo '<button type="submit" class="enviar">Enviar</button>';
        echo '</form>';
        echo '</div>';
        break;
    case 49: //armarioAberto
        renderImage("../scenarios/scenario2/armarioAberto.png");
?>
        <script>
            window.onload = function() {
                reproduzirAudio('chuvaJogo', true);
                if (inventario < 2)
                    reproduzirAudio('armarioAberto', false);
            };
        </script>
    <?php
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(43, " . $idPuzzle . ")");
        if ($inventory == 1)
            echo '<img onclick="salvarTempo(); atualizarInventario(); atualizarVariavel(1);" class="item-inventory" src="../assets/cartao.png">';
        break;
    case 50: //armarioAberto
        renderImage("../scenarios/scenario2/armarioAberto.png");
    ?>
        <script>
            window.onload = function() {
                reproduzirAudio('chuvaJogo', true);
                if (inventario < 1)
                    reproduzirAudio('armarioAberto', false);
            };
        </script>
<?php
        renderButton("down-arrow-position", "salvarTempo(); redirecionarPagina(43, " . $idPuzzle . ")");
        if ($inventory == 0)
            echo '<img onclick="salvarTempo(); atualizarInventario(); atualizarVariavel(1);" class="item-inventory" src="../assets/chave.png">';
        break;
}

?>