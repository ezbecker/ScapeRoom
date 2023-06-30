<?php
function search_user($conectado, $email)
{
    $query = "SELECT idUsuario, nome FROM usuario WHERE email = ?";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return null;
}

function search_game($conectado, $idUsuario)
{
    $query = "SELECT tempo, idPartida, inventario FROM partida WHERE idUsuario = ? ORDER BY idPartida DESC LIMIT 1";
    $stmt = mysqli_prepare($conectado, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return null;
}
function playing($pagina)
{
    if ($pagina != 1 && $pagina != 51 && $pagina != 333 && $pagina != 2 && $pagina != 52)
        return true;
    else
        return false;
}
