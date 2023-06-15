<?php

//Inicio da conexao com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "barbearia-barao";


try {
    //Conexao com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexao sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user);
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
    //Fim da conexão com o banco de dados utilizando PDO
