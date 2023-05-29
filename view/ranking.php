<?php
require_once "../controller/userAutenticado.php";
require_once "../model/conexao.php";
$query = "SELECT * FROM usuario natural join partida where terminou = 1 ORDER BY tempo ASC";
$result = mysqli_query($conectado, $query);

echo '<h2>Ranking dos Usuários</h2>';
echo '<ol id="ranking-list">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li>';
    echo '<span class="name">' . $row['nome'] . "  " . '</span>';
    echo '<span class="time">' . $row['tempo'] . '</span>';
    echo '</li>';
}
echo '</ol>';

mysqli_close($conectado);
?>
<a href="game.php?pagina=1&idPuzzle=0">Voltar</a>