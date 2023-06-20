<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbearia-barao";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obter dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Inserir nova mensagem no banco de dados
    $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    if (mysqli_query($conn, $sql)) {
        // Mensagem enviada com sucesso
        echo "Mensagem enviada com sucesso!";
    } else {
        // Erro ao enviar mensagem
        echo "Erro ao enviar mensagem: " . mysqli_error($conn);
    }

    // Fechar conexão com o banco de dados
    mysqli_close($conn);
}
?>


