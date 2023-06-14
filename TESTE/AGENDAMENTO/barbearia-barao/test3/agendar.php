<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbearia-barao";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
	die("Conexão falhou: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obter dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $profissional = $_POST['profissional'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $horario = $_POST['hora'];

    // Verificar se o profissional e o horário escolhidos estão disponíveis
    $sql = "SELECT * FROM agendamentos WHERE profissional = '$profissional' AND data = '$data' AND hora = '$horario'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Profissional e horário já estão agendados
        echo '<p>Desculpe, esse horário já está agendado para esse profissional. Por favor, escolha outro horário ou profissional.</p>';
    } else {
        // Inserir novo agendamento no banco de dados
        $sql = "INSERT INTO agendamentos (nome, email, telefone, profissional, servico, data, hora) VALUES ('$nome', '$email', '$telefone', '$profissional', '$servico', '$data', '$horario')";
        if (mysqli_query($conn, $sql)) {
            // Agendamento realizado com sucesso
            echo '<p>Agendamento realizado com sucesso!</p>';
        } else {
            // Erro ao realizar agendamento
            echo '<p>Desculpe, ocorreu um erro ao realizar o agendamento. Por favor, tente novamente mais tarde.</p>';
        }
    }

    // Fechar conexão com o banco de dados
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Agendar serviço</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<style>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

form {
  width: 50%;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f2f2f2;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type=text],
input[type=email],
input[type=tel],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style
	<h1>Agendar serviço</h1>
	<form method="post" action="agendar.php">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" required><br>

		<label for="email">E-mail:</label>
		<input type="email" name="email" required><br>

		<label for="telefone">Telefone:</label>
		<input type="tel" name="telefone" required><br>

		<label for="data">Data:</label>
		<input type="date" name="data" required><br>

		<label for="hora">Hora:</label>
		<input type="time" name="hora" required><br>

		<label for="profissional">Profissional:</label>
		<select name="profissional" required>
			<option value="">Selecione</option>
			<option value="jose">José</option>
			<option value="mikael">Mikael</option>
			<option value="alan">Alan</option>
		</select><br>

		<label for="servico">Serviço:</label>
		<select name="servico" required>
			<option value="">Selecione</option>
			<option value="Corte de cabelo">Corte de cabelo</option>
			<option value="Barba">Barba</option>
			<option value="Corte e barba">Corte e barba</option>
			<option value="Coloração">Coloração</option>
			<option value="Manicure">Manicure</option>
		</select><br>

		<input type="submit" value="Agendar">
	</form>
</body>
</html>
