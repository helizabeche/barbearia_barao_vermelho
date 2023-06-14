<?php
    include_once('config.php');

    $sql = "SELECT * FROM agendamentos";

    $res = $conexao->query($sql);

    if($res->num_rows > 0){
        $html = "<table border='1'>";
        while($row = $res->fetch_object()){
            $html .=   "<tr>";
            $html .=   "<td>".$row->id."</td>";
            $html .=   "<td>".$row->nome."</td>";
            $html .=   "<td>".$row->telefone."</td>";
            $html .=   "<td>".$row->email."</td>";
            $html .=   "<td>".$row->servico."</td>";
            $html .=   "<td>".$row->profissional."</td>";
            $html .=   "<td>".$row->data."</td>";
            $html .=   "<td>".$row->hora."</td>";
            $html .=   "</tr>";
        }
        print "</table>";
    }else{
        print ' nem um dado registrado';
    }

//gera o pdf

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml("$html");

$dompdf->set_option('defautFont', 'sans' );

$dompdf->setPaper('A4' , 'portrait' );

$dompdf->render();

$dompdf->stream();

?>