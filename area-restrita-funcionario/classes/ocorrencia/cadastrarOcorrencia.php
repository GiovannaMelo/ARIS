<?php
//Incluindo as classes
include_once ('../Conexao.php');
require_once ('../Ocorrencia.php'); 

try {
    header ("Location: ../../funcionario.php");
    date_default_timezone_set('America/Sao_Paulo');

    $horaEntrada = date('H:i:s');
    $dataOcorrencia = date('d-m-Y');
    $codPaciente =  $_POST['pacienteEscolhido'];
    $codMedico =  $_POST['medicoEscolhido'];
    $codProntuario = $_POST['codProntuario'];

    $parteMedico = explode("-", $codMedico);
    $partePaciente = explode("-", $codPaciente);

    $codFinalPaciente = $partePaciente[0];
    $codFinalMedico = $parteMedico[0];

    $dataConvertida = date('Y-m-d',strtotime($dataOcorrencia));
    $Ocorrencia = new Ocorrencia();

    $Ocorrencia->setCodPaciente($codFinalPaciente);
    $Ocorrencia->setCodMedico($codFinalMedico);
    $Ocorrencia->setCodProntuario($codProntuario);
    $Ocorrencia->setHoraEntradaOcorrencia($horaEntrada);
    $Ocorrencia->setStatusOcorrencia("triagem");
    $Ocorrencia->setDataOcorrencia($dataConvertida);
    
        

    $Ocorrencia->cadastrar($Ocorrencia);
    
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}

?> 
