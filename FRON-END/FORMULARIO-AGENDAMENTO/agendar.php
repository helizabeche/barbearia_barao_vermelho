<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Formulário</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #000;
}

h1{
  text-align: center;
  font-family: 'Cinzel', serif;
  color: white;
}

.container {
    width: 80%;
    height: 80vh;
    display: flex;
    color: black;
}

.form-image {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #000;
    padding: 1rem;
}

.form-image img {
    width: 31rem;
}

.form {
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #660708;
    padding: 3rem;
    border: 3px solid #7f0000;
}

.form-header {
    margin-bottom: 3rem;
    display: flex;
    justify-content: space-between;
}


.form-header h1::after {
    content: '';
    display: block;
    width: 17rem;
    height: 0.3rem;
    background-color: #7f0000;
    margin: 0 auto;
    position: absolute;
    border-radius: 10px;
}

.input-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 1rem 0;
}

.input-box {
    display: flex;
    flex-direction: column;
    margin-bottom: 1.1rem;
}

.input-box input, select {
    margin: 0.6rem 0;
    padding: 0.8rem 1.2rem;
    border: none;
    border-radius: 10px;
    box-shadow: 1px 1px 6px #0000001c;
    font-size: 0.8rem;
}

.input-box select, input:hover {
    background-color: #eeeeee75;
}

.input-box select, input:focus-visible {
    outline: 1px solid #6c63ff;
}

.input-box label, 
.gender-title h6 {
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
}

.input-box select, input::placeholder {
    color: #000000be;
 
}
.botao-agendar {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.botao-agendar:hover {
  background-color: #45a049;
}



.mensagem {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 10px;
  background-color: #f44336;
  color: #fff;
  font-family: Arial, sans-serif;
  font-size: 14px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}


@media screen and (max-width: 1330px) {
    .form-image {
        display: none;
    }
    .container {
        width: 50%;
    }
    .form {
        width: 100%;
    }
}

@media screen and (max-width: 1064px) {
    .container {
        width: 90%;
        height: auto;
    }
    .box{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;}
   
}

    </style>
    <div class="container">
        <div class="form-image">
            <img src="baraologo.png" alt="">
        </div>
        <div class="form">
            <form method="post" action="agendar.php">
                <div class="form-header">
                    <div class="title">
                        <h1>Agende Seu Horário</h1>
                    </div>
                    
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome:</label>
	                	<input type="text" name="nome" required><br>

                    </div>

                    <div class="input-box">
                        <label for="email">E-mail:</label>
                		<input type="email" name="email" required><br> 
                    
                    </div>
                    <div class="input-box">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" name="telefone" required><br>
                    </div>

                    <div class="input-box">
                        <label for="data">Data:</label>
                        <input type="date" name="data" required><br>
                    </div>

                    <div class="input-box">
                        <label for="hora">Hora:</label>
	                	<input type="time" name="hora" required><br>
                    </div><br><br>

                    <div class="input-box">
                         <label for="profissional">Profissional:</label> 
                         <select name="profissional" required>
                            <option value="">Selecione</option>
                            <option value="Alan">Alan</option>
                            <option value="José">José</option>
                            <option value="Mikael">Mikael</option>
                        </select><br>
                    
                </div>

                    <div class="input-box">
                        <label for="servico">Serviço:</label> 
                        <select name="servico" required>
                            <option value="">Selecione</option>
                            <option value="Corte de cabelo">Corte de Cabelo</option>
                            <option value="Barba">Barba</option>
                            <option value="Corte e barba">Sobrancelha</option>
                            <option value="Coloração">Tingimento</option>
                            <option value="Manicure">Depilação</option>
                            <option value="Manicure">Hidratação</option>
                        </select><br>  
                </div>
                </div>

               

                <div class="botao">
                	<input type="submit" value="Agendar" class="botao-agendar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

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
        echo '<div class="mensagem"  id="notificacao">Desculpe, esse horário já está agendado para esse profissional. Por favor, escolha outro horário ou profissional.</div>';

    } else {
        // Inserir novo agendamento no banco de dados
        $sql = "INSERT INTO agendamentos (nome, email, telefone, profissional, servico, data, hora) VALUES ('$nome', '$email', '$telefone', '$profissional', '$servico', '$data', '$horario')";
        if (mysqli_query($conn, $sql)) {
            // Agendamento realizado com sucesso
            echo '<div class="mensagem"  id="notificacao"><p>Agendamento realizado com sucesso!</p></div>';
        } else {
            // Erro ao realizar agendamento
            echo '<div class="mensagem"  id="notificacao"><p>Desculpe, ocorreu um erro ao realizar o agendamento. Por favor, tente novamente mais tarde.</p</div>';
        }
    }

    // Fechar conexão com o banco de dados
    mysqli_close($conn);
}
?>
<script>

const notificacao = document.getElementById('notificacao');

notificacao.addEventListener('click', () => {
  notificacao.style.display = 'none'; // Oculta a mensagem ao ser clicada
});

</script>