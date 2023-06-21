<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Validar e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	die('E-mail inválido');
}

// Validar senha
if (strlen($senha) < 8) {
	die('A senha deve ter pelo menos 8 caracteres');
}

// Hash de senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Inserir dados com prepared statement
$stmt = $conectado->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $senhaHash);

try {
	$stmt->execute();
	header('location: ../index.php');
} catch (Exception $e) {
	die('Erro ao inserir dados: ' . $e->getMessage());
}
