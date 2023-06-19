<?php
$MYSQL_URL = $_ENV['MYSQL_URL'];

try {
	$conectado = new PDO($MYSQL_URL);
} catch (PDOException $e) {
	echo "Erro ao conectar: " . $e->getMessage();
}