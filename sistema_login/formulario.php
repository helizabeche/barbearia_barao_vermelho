<?php

if(isset($_POST['submit']))
{
    //print_r('Nome: '  . $_POST['nome']);
    //print_r('<br>);
    //print_r('Senha: '  . $_POST['senha]);
    //print_r('<br>');
    //print_r('Email: '  . $_POST['email']);
    //print_r('<br>');
    //print_r('Telefone: '  . $_POST['telefone']);
    //print_r('<br>');
    //print_r('Tipo: '  . $_POST['tipo']);
    //print_r('<br>');
    //print_r('Cidade: '  . $_POST['cidade']);
    //print_r('<br>');
    //print_r('Estado: '  . $_POST['estado']);
    //print_r('<br>');
    //print_r('Endereco: '  . $_POST['endereco']);
    

    include_once('config.php');

    $nome =  $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email,telefone,tipo,cidade,estado,endereco) 
    VALUES ('$nome','$senha','$email','$telefone','$tipo','$cidade','$estado','$endereco')");
     
     header('Location: login.php');   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | BV</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #000;
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
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
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
        
        #submit{
            background: #000;
            width: 100%;
            border: 3px solid #7f0000;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background:#7f0000;
        }
    </style>
</head>
<body>

    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Tipo:</p>
                    <input type="radio" id="adulto" name="tipo" value="adulto" required>
                    <label for="adulto">Adulto</label>
                <br>
                  <input type="radio" id="adolescente" name="tipo" value="adolescente" required>
                  <label for="adolescente">Adolescente</label>
                <br>
                    <input type="radio" id="infantil" name="tipo" value="infantil" required>
                    <label for="infantil">Infantil</label>
                <br>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>