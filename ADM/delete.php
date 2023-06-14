<?php
include_once('config.php');


// Verificando se o ID do registro a ser excluído foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Construindo a consulta SQL para excluir o registro
    $sql = "DELETE FROM agendamentos WHERE id='$id'";

    // Executando a consulta
    if (mysqli_query($conexao, $sql)) {
        header('Location: front.php');
        //header('Location: sistema.php');
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($conexao);
    }
    
} else {
    echo "ID do registro não fornecido.";
}

// Fechando a conexão
mysqli_close($conn);
?>
