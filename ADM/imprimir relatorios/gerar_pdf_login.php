<?php

// Carregar o Composer
require './vendor/autoload.php';

// Receber da URL o termo usado para pesquisar
$texto_pesquisar = filter_input(INPUT_GET, 'texto_pesquisar', FILTER_DEFAULT);

// Acrescentar no termo de pesquisa "%" para usar no LIKE e indica que pode ter caracteres antes e depois do termo pesquisado
$nome = "%" . $texto_pesquisar . "%";

// Incluir conexao com BD
include_once './conexao.php';

// QUERY para recuperar os registros do banco de dados
$query_usuarios = "SELECT id, nome, email, senha, telefone, cidade, estado, endereco
                FROM usuarios
                WHERE nome LIKE :nome
                ORDER BY id DESC";

// Prepara a QUERY
$result_usuarios = $conn->prepare($query_usuarios);

// Substituir o link da QUERY pelo termo de pesquisa
$result_usuarios->bindParam(':nome', $nome);

// Executar a QUERY
$result_usuarios->execute();

// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/celke/css/custom.css'";
$dados .= "<title>Celke - Gerar PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Listar os Usuário</h1>";

// Ler os registros retornado do BD
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    
    // Extrair o array para imprimir pela chave do array
    extract($row_usuario);

    // Imprimir os dados usando a chave do array como variável em função do extract executado acima
    $dados .= "ID: $id <br>";
    $dados .= "Nome: $nome <br>";
    $dados .= "E-mail: $email <br>";
    $dados .= "Senha: $senha <br>";
    $dados .= "telefone: $telefone <br>";
    $dados .= "Cidade: $cidade <br>";
    $dados .= "Estado: $estado <br>";
    $dados .= "Endereço: $endereco <br>";
    $dados .= "<hr>";
}
$dados .= "</body>";
$dados .= "</html>";

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
?>