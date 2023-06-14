<!DOCTYPE html>
<html>
<head>
	<title>Meus Agendamentos</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Meus Agendamentos</h1>
		<table>
			<thead>
				<tr>
					<th>Data</th>
					<th>Hora</th>
					<th>Profissional</th>
					<th>Serviço</th>
					<th>Cancelar</th>
				</tr>
			</thead>
			<tbody>
				<?php
                //meus_agendamentos
				// Inclui o arquivo de conexão com o banco de dados
				include 'conexao.php';

				// Obtém o ID do cliente a partir da sessão
				session_start();
				$id = $_SESSION['id'];

				// Seleciona os agendamentos do cliente
				$sql = "SELECT * FROM agendamentos WHERE id = $id ORDER BY data, hora";
				$resultado = mysqli_query($conexao, $sql);

				// Loop através dos agendamentos e exibe na tabela
				while ($agendamento = mysqli_fetch_assoc($resultado)) {
					$id_agendamento = $agendamento['id'];
					$data = date('d/m/Y', strtotime($agendamento['data']));
					$hora = $agendamento['hora'];
					$profissional = $agendamento['profissional'];
					$servico = $agendamento['servico'];
					echo "<tr>
							<td>$data</td>
							<td>$hora</td>
							<td>$profissional</td>
							<td>$servico</td>
							<td><a href='cancelar.php?id=$id_agendamento'>Cancelar</a></td>
						</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
