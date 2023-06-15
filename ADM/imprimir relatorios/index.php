<?php
// Incluir conexao com BD
include_once('./conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Celke - Gerar PDF com imagem</title>
</head>

<body>

    <h1>Como gerar PDF com PHP</h1>

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>

    <?php
    // Criar a variável que deve receber o termo pesquisado
    // A variável é utilizada para enviar dados para a página gerar PDF e também manter o valor no formulário
    $texto_pesquisar = "";

    // Verificar se existe termo pesquisado, existindo acessa o IF e atribui o valor na variável $texto_pesquisar
    if (isset($dados['texto_pesquisar'])) {
        $texto_pesquisar = $dados['texto_pesquisar'];
    }

    // Link para gerar PDF e também enviar o termo de pesquisa
    echo "<a href='gerar_pdf.php?texto_pesquisar=$texto_pesquisar'>Gerar PDF</a><br><br>";
    ?>


    <form method="POST" action="">
        <label>Pesquisar</label>
        <!-- Campo para pesquisa o termo -->
        <input type="text" name="texto_pesquisar" placeholder="Pesquisar pelo termo?" value="<?php echo $texto_pesquisar; ?>"><br><br>

        <input type="submit" value="Pesquisar" name="PesqUsuario"><br><br>

    </form>

    <?php
    // Acessa o IF quando o usuário clicar no botão pesquisar
    if (!empty($dados['PesqUsuario'])) {
        // Acrescentar no termo de pesquisa "%" para usar no LIKE e indica que pode ter caracteres antes e depois do termo pesquisado
        $nome = "%" . $dados['texto_pesquisar'] . "%";

        // QUERY para recuperar os registros do banco de dados
        $query_usuarios = "SELECT id, nome, email, telefone, servico, profissional, data, hora, status
                FROM agendamentos
                WHERE nome LIKE :nome
                ORDER BY id DESC";

        // Prepara a QUERY
        $result_usuarios = $conn->prepare($query_usuarios);

        // Substituir o link da QUERY pelo termo de pesquisa
        $result_usuarios->bindParam(':nome', $nome);
        

        // Executar a QUERY
        $result_usuarios->execute();

        // Acessa o IF quando encontrar registro no BD
        if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {

            $dados = "";

            // Concatenar os dados em forma de tabela
            $dados .= "<table>";
            $dados .= "<tr>";
            $dados .= "<th>ID</th>";
            $dados .= "<th>Nome</th>";
            $dados .= "<th>E-mail</th>";
            $dados .= "<th>Telefone</th>";
            $dados .= "<th>Serviço</th>";
            $dados .= "<th>Profissional</th>";
            $dados .= "<th>Data</th>";
            $dados .= "<th>Hora</th>";
            $dados .= "<th>Status</th>";
            $dados .= "</tr>";

            // Ler os registros retornado do BD
            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {

                // Extrair o array para imprimir pela chave do array
                extract($row_usuario);

                // Imprimir os dados usando a chave do array como variável em função do extract executado acima
                /*echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "telefone: $telefone <br>";
                echo "servico: $servico <br>";
                echo "profissional: $profissional <br>";
                echo "data: $data <br>";
                echo "hora: $hora <br>";
                echo "status: $status <br>";
                echo "<hr>"; */

                // Concatenar os dados na variável $dados em forma de tabela
                $dados .= "<tr>";
                $dados .= "<td>".$id."</td>";
                $dados .= "<td>".$nome."</td>";
                $dados .= "<td>".$email."</td>";
                $dados .= "<td>".$telefone."</td>";
                $dados .= "<td>".$servico."</td>";
                $dados .= "<td>".$profissional."</td>";
                $dados .= "<td>".$data."</td>";
                $dados .= "<td>".$hora."</td>";
                $dados .= "<td>".$status."</td>";
                $dados .= "</tr>";
            }

            $dados .= "</table>";

    // Imprimir os dados
    echo $dados;
            
        } else { // Acessa o ELSE quando não encontrar nenhum registro no banco de dados
            echo "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
        }
    }
    ?>

</body>

</html>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
