<?php
$DB_SERVER = $_ENV['DB_SERVER'] . ':7777';
$DB_USERNAME = $_ENV['DB_USERNAME'];
$DB_PASSWORD = $_ENV['DB_PASSWORD'];
$DB_NAME = $_ENV['DB_NAME'];

try {
	$conectado = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
} catch (Exception $e) {
	echo "Erro ao conectar: " . $e->getMessage();
}