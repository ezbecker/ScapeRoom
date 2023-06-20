<?php
session_start();

$novoValor = $_POST['vazio'];

$_SESSION['vazio'] = $novoValor;
