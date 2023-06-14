<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "barbearia-barao";

// Estabelecendo a conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificando a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $profissional = $_POST['profissional'];
    $pagamento = $_POST['pagamento'];

    // Construindo a consulta SQL para atualizar os dados
    $sql = "UPDATE agendamentos SET nome='$nome', email='$email', telefone='$telefone', servico='$servico', data='$data', hora='$hora', profissional='$profissional', pagamento='$pagamento' WHERE id='$id'";

    // Executando a consulta
    if (mysqli_query($conn, $sql)) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . mysqli_error($conn);
    }
}

// Fechando a conexão
mysqli_close($conn);
?>
