<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	die('E-mail inválido');
}

if (strlen($senha) < 8) {
	die('A senha deve ter pelo menos 8 caracteres');
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $conectado->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $senhaHash);

try {
	$stmt->execute();

} catch (Exception $e) {
	die('Erro ao inserir dados: ' . $e->getMessage());
}
