<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbearia-barao";

$conn = mysqli_connect($servername, $username, $password, $dbname);


// Verificar a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}



// Consulta para contar o número de registros
$sql = "SELECT COUNT(*) AS total FROM agendamentos";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// Imprimir o resultado
echo "Número de registros: " . $data['total'];

// Fechar a conexão
mysqli_close($conn);
?>
