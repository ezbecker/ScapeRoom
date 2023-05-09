<?php
$conectado = mysqli_connect("localhost:3307", "root", "", "scaperoom");

if (!$conectado) {
	echo "Erro ao conectar";
}
