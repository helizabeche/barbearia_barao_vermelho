<?php
// Conecte-se ao banco de dados (substitua os valores conforme sua configuração)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbearia-barao";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$status = $_POST['status'];

$sql = "SELECT * FROM agendamentos WHERE status = '$status'";
$result = $conn->query($sql);


// Verifique se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Exiba os resultados na tabela
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    // ... Adicione as outras colunas da tabela aqui
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        // ... Adicione as outras colunas da tabela aqui
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

// Feche a conexão com o banco de dados
$conn->close();



//NÃO UTILIZAREI ESTE ARQUIVO
?>
