<?php
//Incluindo as classes
include_once ('../Conexao.php');
require_once ('../Ocorrencia.php'); 

try {
    header ("Location: ../../medico.php");


    $Ocorrencia = new Ocorrencia();

    date_default_timezone_set('America/Sao_Paulo');
    $horaAtual = date('H:i:s');
    $Ocorrencia->setCodOcorrencia($_POST['codOcorrencia']);
    $Ocorrencia->setStatusOcorrencia("finalizado");
    $Ocorrencia->setHoraSaidaOcorrencia($horaAtual);

    $Ocorrencia->finalizar($Ocorrencia);
    
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}

?> 
