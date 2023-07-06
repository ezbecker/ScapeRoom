<?php
if ($pagina == 51) {
    renderImage("../scenarios/win.png");
    $tempo1 = new DateTime('00:30:00');
    $tempo2 = new DateTime($game['tempo']);
    $intervalo = $tempo1->diff($tempo2);
    $tempoFinal = $intervalo->format('%H:%I:%S');
    $ouro = new DateTime('00:06:00');
    $prata = new DateTime('00:12:00');
    if ($tempoFinal < $ouro) {
        echo '<img class="medal" src="../assets/ouro.png">';
    } else if ($tempoFinal < $prata) {
        echo '<img class="medal" src="../assets/prata.png">';
    } else {
        echo '<img class="medal" src="../assets/bronze.png">';
    }
    echo '<p class="congrats-text">Parabéns ' . $user['nome'] . ' !</p>';
    echo '<p class="time-text">Você terminou em ' . $tempoFinal . '</p>';
    echo '<a target="_blank" class="feedback-button" href="https://forms.gle/aDLMhDkCbstbBxsy5">Avalie o jogo</a>';
    renderButton("right-arrow-position", "reproduzirAudio('chuvaInicio', true); redirecionarPagina(1,0);");
?>
    <script>
        window.onload = function() {
            reproduzirAudio('win', false);
        };
    </script>
<?php
} else if ($pagina == 52) {
    renderImage("../scenarios/gameOver.png");
    renderButton("right-arrow-position", "reproduzirAudio('chuvaInicio', true); redirecionarPagina(1,0);");
?>
    <script>
        window.onload = function() {
            reproduzirAudio('gameOver', false);
        };
    </script>
<?php
}
