<?php
function searchQuestion_scenario3($conectado, $idPuzzle, $pagina)
{
    $query = "SELECT postit, caderno FROM puzzle WHERE idPuzzle = ?";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "i", $idPuzzle);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else
        return null;
}

function searchExam_scenario3($conectado, $idPuzzle, $pagina)
{
    $query = "SELECT exame, pacienteCodigo FROM puzzle natural join cenario2 WHERE idPuzzle = ? and paginaExame = ?";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "ii", $idPuzzle, $pagina);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else
        return null;
}

function searchPatient_scenario3($conectado, $idPuzzle, $pagina, $paginaArmario)
{
    $query = "SELECT pacienteNome, idade, genero, caso FROM puzzle natural join cenario2 natural join `cenario2-pacientes`  WHERE idPuzzle = ? and (paginaPac = ? or paginaPac = ?)";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "iii", $idPuzzle, $pagina, $paginaArmario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else
        return null;
}
