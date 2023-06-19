<?php
$mysql_url = $_ENV['MYSQL_URL'];

try {
	$conectado = new PDO($mysql_url);
} catch (PDOException $e) {
	echo "Erro ao conectar: " . $e->getMessage();
}