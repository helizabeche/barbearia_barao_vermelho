<?php

require 'config.php'

$result = mysqli_query($conexao);

while($dados = mysqli_fetch_assoc ($result)) {

    $id = $dados ['id'];
    $nome = $dados ['nome'];
    $telefone = $dados ['email'];
    $data = $dados ['data'];
    $hora = $dados ['hora'];
    $servico = $dados ['servico'];
    $profissional = $dados ['profissional'];

    echo "<tr>";
                        echo "<td>".$dados['id']."</td>";
                        echo "<td>".$dados['nome']."</td>";
                        echo "<td>".$dados['email']."</td>";
                        echo "<td>".$dados['telefone']."</td>";
                        echo "<td>".$dados['servico']."</td>";
                        echo "<td>".$dados['data']."</td>";
                        echo "<td>".$dados['hora']."</td>";
                        echo "<td>".$dados['profissional']."</td>";
                        echo "<td>ações</td>";
                     
    
}


?>