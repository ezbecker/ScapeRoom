<?php
function searchQuestion_scenario2($conectado, $idPuzzle, $pagina)
{
    $query = "SELECT nome,idade,sintomas,tomografia FROM puzzle natural join cenario1 WHERE idPuzzle = ? AND pagina = ? ";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "ii", $idPuzzle, $pagina);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return null;
}
function searchTrash_scenario2($conectado, $idPuzzle)
{
    $query = "SELECT caderno FROM puzzle WHERE idPuzzle = $idPuzzle";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return null;
}
function exibirClipboard_scenario2($puzzle)
{
    echo '<div class="question-overlay">';
    echo '<p class="clipboard-name">' . $puzzle['nome'] . '</p>';
    echo '<p class="clipboard-age">' . $puzzle['idade'] . '</p>';
    echo '<p class="clipboard-symptoms">' . $puzzle['sintomas'] . '</p>';
    echo '<p class="clipboard-diagnosis">' . $puzzle['tomografia'] . '</p>';
    echo '</div>';
}
