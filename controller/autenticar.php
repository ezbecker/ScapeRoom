<?php
session_start();
require_once "../model/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
	$senha = filter_input(INPUT_POST, "senha");

	if ($email && $senha) {
		$senhaCr = password_hash($senha, PASSWORD_DEFAULT);
		$query = "SELECT * FROM usuario WHERE email = ?";
		$stmt = mysqli_prepare($conectado, $query);
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if (password_verify($senha, $row["senha"])) {
				$_SESSION["email"] = $email;
				$_SESSION["pagina"] = 1;
				$_SESSION["idPuzzle"] = 0;
				$_SESSION['vazio'] = 0;
				header("Location: ../view/game.php");
				exit();
			} else {
				header("Location: ../view/login.php?erro=credenciais");
				exit();
			}
		} else {
			header("Location: ../view/login.php?erro=credenciais");
			exit();
		}
	} else {
		header("Location: ../view/login.php?erro=campos");
		exit();
	}
} else {
	header("Location: ../view/login.php");
	exit();
}
