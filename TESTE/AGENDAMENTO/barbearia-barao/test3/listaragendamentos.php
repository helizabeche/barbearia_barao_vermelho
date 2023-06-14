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


// Busca todos os agendamentos
$sql = "SELECT * FROM agendamentos";
$resultado = mysqli_query($conexao, $sql);

// Cria a tabela para exibir os agendamentos
echo "<table>";
echo "<tr><th>ID</th><th>Cliente</th><th>Email</th><th>Telefone</th><th>Data</th><th>Hora</th><th>Profissional</th><th>Serviço</th><th>Status</th><th>Ações</th></tr> ";
while ($linha = mysqli_fetch_array($resultado)) {
    // Exibe as informações do agendamento
    echo "<tr>";
    echo "<td>" . $linha['id'] . "</td>";
    echo "<td>" . $linha['nome'] . "</td>";
    echo "<td>" . $linha['email'] . "</td>";
    echo "<td>" . $linha['telefone'] . "</td>";
    echo "<td>" . $linha['data'] . "</td>";
    echo "<td>" . $linha['hora'] . "</td>";
    echo "<td>" . $linha['profissional'] . "</td>";
    echo "<td>" . $linha['servico'] . "</td>";
    echo "<td>" . $linha['status'] . "</td>";

    // Adiciona os botões para edição e exclusão
    echo "<td>";
    echo "<a href='editar_agendamento.php?id=" . $linha['id'] . "'>Editar</a> ";
    echo "<a href='excluir_agendamento.php?id=" . $linha['id'] . "'>Excluir</a> ";
    // Adiciona o botão para marcar como concluído
    if ($linha['status'] == 'pendente') {
        echo "<a href='concluir_agendamento.php?id=" . $linha['id'] . "'>Concluir</a>";
    }
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Minha Página</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!-- conteúdo da página -->
</body>
</html>
