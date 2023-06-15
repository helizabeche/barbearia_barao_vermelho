
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>M<span>odern</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(img/3.jpeg)"></div>
                <h4>David Green</h4>
                <small>Art Director</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="http://localhost/barbearia-barao/ADM/crud_agendamento/front.php" >
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="http://localhost/barbearia-barao/ADM/crud_login/crud_login.php" >
                       <span class="material-symbols-outlined">groups</span>
                            <small>clientes</small>
                        </a>
                    </li>
                    <li>
                       <a href="http://localhost/barbearia-barao/ADM/imprimir%20relatorios/relatorios.php" class="active">
                            <span class="las la-clipboard-list"></span>
                            <small>Relatórios</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-tasks"></span>
                            <small>Tasks</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">
                    <label for="">
                        <span class="las la-search"></span>
                    </label>
                    
                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>
                    
                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>
                    
                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/1.jpeg)"></div>
                        
                        <span class="las la-power-off"></span>
                        <span>Logout</span>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Dashboard</h1>
                <h3>Relatórios</h3>
            </div>
            

                    
                            <?php
                            // Incluir conexao com BD
                            include_once('./conexao.php');
                           
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
                                echo "<button class='btn btn-primary' onclick=\"window.location.href='gerar_pdf.php?texto_pesquisar=$texto_pesquisar'\">Gerar PDF</button><br><br>";
                                ?>


                                <form method="POST" action="">
                                    <!-- Campo para pesquisa o termo -->
                                    <input type="text" name="texto_pesquisar" placeholder="Pesquisar pelo termo?" value="<?php echo $texto_pesquisar; ?>">

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


                        </div>

                    </div>
                       

                </div>
            
            </div>
            
        </main>
        
    </div>
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