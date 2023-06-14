<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbearia-barao";

$conexao = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conexao) {
	die("Conexão falhou: " . mysqli_connect_error());
}

?>