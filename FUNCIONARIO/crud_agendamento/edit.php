<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM agendamentos WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $id = $user_data['id'];
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $data = $user_data['data'];
                $hora = $user_data['hora'];
                $servico = $user_data['servico'];
                $profissional= $user_data['profissional'];
                $status= $user_data['status'];
                
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: front.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #003;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #000;
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid #7f0000;
        }
        legend{
            border: 1px solid #7f0000;
            padding: 10px;
            text-align: center;
            background-color: #000;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background-color:#005f73 ;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color:white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #7f0000;
        }
        .submit{
            background: #000;
            width: 100%;
            border: 3px solid #7f0000;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        .submit:hover{
            background: #04040400;
        }
    </style>
</head>
<body>
    <a href="front.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Cliente</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome;?> required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value=<?php echo $email;?> required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value=<?php echo $telefone;?> required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="data">Data:</label>
                    <input type="date" name="data"  value=<?php echo $data;?> required ><br>
                </div>
                <br><br>
                <div class="inputbox">
                    <label for="hora">Hora:</label>
	                <input type="time" name="hora" value=<?php echo $hora;?>  required><br>
                </div>
                <br><br>
                <div class="inputbox">
                        <label for="servico">Serviço:</label>
                           <select name="servico" required>
                                <option value="">Selecione</option>
                                <option value="Corte de cabelo" <?php if ($servico == 'Corte de cabelo') echo 'selected'; ?>>Corte de Cabelo</option>
                                <option value="Barba" <?php if ($servico == 'Barba') echo 'selected'; ?>>Barba</option>
                                <option value="Sobrancelha" <?php if ($servico == 'Sobrancelha') echo 'selected'; ?>>Sobrancelha</option>
                                <option value="Coloração" <?php if ($servico == 'Coloração') echo 'selected'; ?>>Coloração</option>
                                <option value="Limpesa facial" <?php if ($servico == 'Limpesa facial') echo 'selected'; ?>>Limpeza facial</option>
                                <option value="Hidratação" <?php if ($servico == 'Hidratação') echo 'selected'; ?>>Hidratação</option>
                             </select>
                        <br><br>
                    </div>
                    <br><br>
                <div class="inputBox">
                    <label for="profissional">Profissional:</label>
                    <select name="profissional" id="profissional" class="inputUser" required>
                        <option value="">Selecione</option>
                        <option value="Alan" <?php if ($profissional == 'Alan') echo 'selected'; ?>>Alan</option>
                        <option value="José" <?php if ($profissional == 'José') echo 'selected'; ?>>José</option>
                        <option value="Mikael" <?php if ($profissional == 'Mikael') echo 'selected'; ?>>Mikael</option>
                    </select><br>
                </div>
                <br><br>
                <div class="inputBox">
                <label for="status">Status:</label>
                    <select name="status" id="status" class="inputUser" required>
                        <option value="confirmado" <?php if ($status == 'confirmado') echo 'selected'; ?>>Confirmado</option>
                        <option value="concluido" <?php if ($status == 'concluido') echo 'selected'; ?>>Concluído</option>
                        <option value="cancelado" <?php if ($status == 'cancelado') echo 'selected'; ?>>Cancelado</option>
                        <option value="pendente" <?php if ($status == 'pendente') echo 'selected'; ?>>Pendente</option>
                    </select>
                </div>
                    <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="update" class="submit">
                
                
            </fieldset>
        </form>
    </div>
</body>
</html>