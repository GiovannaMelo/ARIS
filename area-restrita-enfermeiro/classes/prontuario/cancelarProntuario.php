<?php
//Incluindo as classes
include_once ('../Conexao.php');
require_once ('../Prontuario.php'); 

try {
    header ("Location: ../../enfermeiro.php");

    $codProntuario = filter_input(INPUT_GET, "id");

    $Prontuario = new Prontuario();

    $Prontuario->setCodProntuario($codProntuario);
    $Prontuario->setStatusProntuario("cancelado");

    $Prontuario->cancelar($Prontuario);
    
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}

?> 
