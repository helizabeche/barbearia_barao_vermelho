<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #000;
        }
        div{
            background-color: #7f0000;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            border: 3px solid #000;
        }
        .inputSubmit{
            background-color: white;
            border: none;
            border-radius: 10px;
            padding: 15px;
            width: 100%;
            font-size: 15px;
            border: 3px solid #000;
            
        }
        .inputSubmit:hover{
           background-color: #7f0000;
          
        }

        h1{
            font-family:Arial, Helvetica, sans-serif;
            text-align: center;

        }

    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
        
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            </form>
    </div>
</body>
</html>