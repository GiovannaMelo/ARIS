<?php
//Incluindo as classes
include_once ('../Conexao.php');
require_once ('../Ocorrencia.php'); 

try {
    $Ocorrencia = new Ocorrencia;

    $Ocorrencia->setCodPaciente($_POST['codPaciente']);
    $Ocorrencia->setCodMedico($_POST['codMedico']);
    $Ocorrencia->setCodOcorrencia($_POST['codOcorrencia']);
    $Ocorrencia->setObservacaoOcorrencia($_POST['obsOcorrencia']);

    $btnSalvar = $_POST['btnSalvar'];
    $btnImprimir = $_POST['btnImprimir'];
    if(isset($btnImprimir)){
        

        $Ocorrencia->observacaoMedico($Ocorrencia);
        
        session_start();
        $_SESSION['paciente-session'] = $_POST['codPaciente'];
        echo $_SESSION['paciente-session'];
        header ("Location: pdf-observacoes.php");
        exit();
    }else if(isset($btnSalvar)){
        header ("Location: ../../medico.php?id=".$_POST['codPaciente']."#observacoes");
         $Ocorrencia->observacaoMedico($Ocorrencia);
    }
        
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?> 
