<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'barbearia-barao';

try {
    // Conexão com o banco de dados
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Consulta SQL para contar todos os registros da tabela agendamentos 
    $sql1 = "SELECT COUNT(*) as total1 FROM agendamentos";
    $resultado1 = $conexao->query($sql1);
    $totalRegistros1 = $resultado1->fetch_assoc()['total1'];

    // Consulta para buscar os agendamentos com status "pendente"
    $sql = "SELECT COUNT(*) as totalPendentes FROM agendamentos WHERE status = 'pendente'";
    $resultado = $conexao->query($sql);
    $totalPendentes = $resultado->fetch_assoc()['totalPendentes'];

    // Consulta SQL para somar os valores da coluna "preco"
    $sql = "SELECT SUM(preco) as totalPrecos FROM servicos";
    $resultado = $conexao->query($sql);
    $totalPrecos = $resultado->fetch_assoc()['totalPrecos'];

            
    // Consulta SQL para somar o preço dos agendamentos concluídos
    //funcionaaaaaaaaaaaaa por favor 
    $sql = "SELECT SUM(servicos.preco) AS totalConcluido FROM servicos
    INNER JOIN agendamentos ON servicos.id = agendamentos.servico
    WHERE agendamentos.status = 'concluido'";
    $resultado = $conexao->query($sql);
    $totalConcluido = $resultado->fetch_assoc()['totalConcluido'];



    // Fechar a conexão com o banco de dados
    $conexao->close();
} catch (Exception $err) {
    echo "Erro: " . $err->getMessage();
}
?>
