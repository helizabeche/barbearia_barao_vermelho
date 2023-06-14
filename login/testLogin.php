<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if(mysqli_num_rows($result) < 1)
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        
        // Verifica o nível de acesso do usuário
        $nivelAcesso = $row['nivel'];
        if($nivelAcesso == 'cliente')
        {
            header('Location: cliente.php'); // Redireciona para a página do cliente
        }
        elseif($nivelAcesso == 'secretario')
        {
            header('Location: secretario.php'); // Redireciona para a página do secretário
        }
        elseif($nivelAcesso == 'administrador')
        {
            header('Location: administrador.php'); // Redireciona para a página do administrador
        }
        else
        {
            header('Location: login.php');
        }
    }
}
else
{
    header('Location: login.php');
}
?>
