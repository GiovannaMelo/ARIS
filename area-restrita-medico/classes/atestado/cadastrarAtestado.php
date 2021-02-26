<?php
    require_once ('../Atestado.php');
    try {
        $btnSalvar = $_POST['btnSalvar'];
        $btnImprimir = $_POST['btnImprimir'];

        $Atestado = new Atestado();
        date_default_timezone_set('America/Sao_Paulo');
        $horaAtual = date('H:i:s');
        $Atestado->setCodMedico($_POST['codMedico']);
        $Atestado->setCodPaciente($_POST['codPaciente']);
        $Atestado->setDiasAtestado($_POST['diasAtestado']);
        $Atestado->setMotivoAtestado($_POST['motivoAtestado']);
        $Atestado->setDataAtestado($_POST['dataAtestado']);
        $Atestado->setHoraAtestado($horaAtual);

        if(isset($btnImprimir)){
            session_start();
            $_SESSION['paciente-session'] = $_POST['codPaciente'];
            header ("Location: pdf-atestado.php");
            exit();

            $Atestado->cadastrarAtestado($Atestado);
        }else if(isset($btnSalvar)){
            $Atestado->cadastrarAtestado($Atestado);
            header ("Location: ../../medico.php?id=".$_POST['codPaciente']."#atestado");
        }


    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

?>