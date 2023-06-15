<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $profissional = $_POST['profissional'];
        $servico = $_POST['servico'];
        $pagamento = $_POST['pagamento'];
        $status = $_POST['status'];
        
        $sqlInsert = "UPDATE agendamentos 
        SET nome='$nome',data='$data',email='$email',telefone='$telefone',hora='$hora',profissional='$profissional',status = '$status',servico='$servico',pagamento='$pagamento'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: front.php');

                // Recupere o valor selecionado do campo select
            $servico = $_POST['servico'];

            // Recupere o ID do registro a ser atualizado (pode ser enviado via formulário ou obtido de outra forma)
            $id = $_POST['id'];

            // Execute a consulta SQL para atualizar o campo select
            $sql = "UPDATE agendamentos SET servico = '$servico' WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "Campo select atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o campo select: " . $conn->error;
            }

            $conn->close();

?>