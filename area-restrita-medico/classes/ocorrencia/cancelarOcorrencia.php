<?php
//Incluindo as classes
include_once ('../Conexao.php');
require_once ('../Ocorrencia.php'); 

try {
    header ("Location: ../../medico.php");

    $codOcorrencia = filter_input(INPUT_GET, "id");

    $Ocorrencia = new Ocorrencia();

    $Ocorrencia->setCodOcorrencia($codOcorrencia);
    $Ocorrencia->setStatusOcorrencia("cancelado");

    $Ocorrencia->cancelar($Ocorrencia);
    
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}

?> 
