<?php
// $envFile = fopen(__DIR__ . '/.env', 'r');
// if ($envFile) {
//    while (($line = fgets($envFile)) !== false) {
//        $line = trim($line);
//        if (strpos($line, '=') !== false) {
//            list($name, $value) = explode('=', $line, 2);
//            $_ENV[$name] = $value;
//        }
//    }
//    fclose($envFile);
//}

$DB_HOST = $_ENV['DB_HOST'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASSWORD = $_ENV['DB_PASSWORD'];
$DB_DATABASE = $_ENV['DB_DATABASE'];
$DB_NAME = $_ENV['DB_NAME'];
$DB_PORT = $_ENV['DB_PORT'];

// Conectar ao banco de dados usando as variáveis ​​definidas acima
$conectado = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE, $DB_PORT);

// Verificar se a conexão foi bem-sucedida
if ($conectado->connect_error) {
	die("Erro ao conectar: " . $conectado->connect_error);
}
