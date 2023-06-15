<?php
    session_start();
    include_once('config.php');

     //PESQUISAR CAMPOS
     if(!empty($_GET['search']))
     {
         $data = $_GET['search'];
         $sql = "SELECT * FROM agendamentos WHERE id LIKE '%$data%' or nome LIKE '%$data%' or status LIKE '%$data%' or telefone  LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
     }
     else
     {
         $sql = "SELECT * FROM agendamentos ORDER BY id DESC";
     }
     $result = $conexao->query($sql);
 
    
     //FILTRAR CAMPOS POR SELECT
  if (!empty($_GET['search'])) {
         $search = $_GET['search'];
       
         // Verificar se o filtro de status está presente
         $statusFilter = !empty($_GET['status']) ? $_GET['status'] : '';
       
         // Construir a cláusula WHERE da consulta SQL com base nos filtros
         $whereClause = "WHERE (id LIKE '%$search%' OR nome LIKE '%$search%' OR telefone LIKE '%$search%' OR email LIKE '%$search%')";
       
         if (!empty($statusFilter)) {
           $whereClause .= " AND status = '$statusFilter'";
         }
       
         // Montar a consulta SQL completa
         $sql = "SELECT * FROM agendamentos $whereClause ORDER BY id DESC";
       } else {
         // Verificar se o filtro de status está presente
         $statusFilter = !empty($_GET['status']) ? $_GET['status'] : '';
       
         // Construir a cláusula WHERE da consulta SQL com base no filtro de status
         $whereClause = '';
       
         if (!empty($statusFilter)) {
           $whereClause = "WHERE status = '$statusFilter'";
         }
       
         // Montar a consulta SQL completa
         $sql = "SELECT * FROM agendamentos $whereClause ORDER BY id DESC";
       }


       
       $result = $conexao->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>página do secretário</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                       <a href="http://localhost/barbearia-barao/FUNCIONARIO/crud_agendamento/front.php" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="http://localhost/barbearia-barao/FUNCIONARIO/imprimir%20relatorios/relatorios.php">
                            <span class="las la-clipboard-list"></span>
                            <small>Relatórios</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-user-alt"></span>
                            <small>Profile</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-envelope"></span>
                            <small>Mailbox</small>
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
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>107,200</h2>
                            
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>User activity this month</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>340,230</h2>
                            <span class="las la-eye"></span>
                        </div>
                        <div class="card-progress">
                            <small>Page views</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>$653,200</h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Monthly revenue growth</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>47,500</h2>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>New E-mails received</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="records table-responsive">
                    
                    <div class="record-header">
                        <div class="add">
                        <form method="GET" action="front.php">
                            <span>filtrar</span>
                            <select name="status">
                                    <option value="">Status</option>
                                    <option value="confirmado">Confirmado</option>
                                    <option value="concluido">Concluído</option>
                                    <option value="cancelado">Cancelado</option>
                                    <option value="pendente">Pendente</option>
                                </select>
                            <button type="submit">Filtrar</button>
                        </form>
                        </div>

                        <div class="relatorio">
                            <form action="relatorio.php" method="post">
                                <button type="submit">Gerar relatório PDF</button>
                            </form>

                        </div>

                        <div class="browse">
                            <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                                <button onclick="searchData()" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                        </div>
                    </div>

                    <div>
                        <div class="m-5">
                                <table class="table table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">Serviço</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Hora</th>
                                            <th scope="col">Profissional</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($user_data = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>".$user_data['id']."</td>";
                                            echo "<td>".$user_data['nome']."</td>";
                                            echo "<td>".$user_data['email']."</td>";
                                            echo "<td>".$user_data['telefone']."</td>";
                                            echo "<td>".$user_data['servico']."</td>";
                                            echo "<td>".$user_data['data']."</td>";
                                            echo "<td>".$user_data['hora']."</td>";
                                            echo "<td>".$user_data['profissional']."</td>";
                                            echo "<td>".$user_data['status']."</td>";
                                            echo "<td>
                                            <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                                </svg>
                                                </a> 
                                                <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                    </svg>
                                                </a>
                                                </td>";
                                            echo "</tr>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                        </div>

                    </div>
                       

                </div>
            
            </div>
            
        </main>
        
    </div>
</body>
</html>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'front.php?search='+search.value;
    }
</script>