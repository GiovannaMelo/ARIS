<?php
    require_once ('../Declaracao.php');
    try {
        $btnSalvar = $_POST['btnSalvar'];
        $btnImprimir = $_POST['btnImprimir'];

        $Declaracao = new Declaracao();
        
        $Declaracao->setCodPaciente($_POST['codPaciente']);
        $Declaracao->setCodMedico($_POST['codMedico']);
        $Declaracao->setDataDeclaracao($_POST['dataDeclaracao']);
        $Declaracao->setAcompDeclaracao($_POST['acompDeclaracao']);
        $Declaracao->setHoraSaidaDeclaracao($_POST['horaSaidaDeclaracao']);
        $Declaracao->setHoraEntradaDeclaracao($_POST['horaEntradaDeclaracao']);

        if(isset($btnImprimir)){
            session_start();
            $_SESSION['paciente-session'] = $_POST['codPaciente'];
            header ("Location: pdf-declaracao.php");
            exit();

            $Declaracao->cadastrarDeclaracao($Declaracao);
        }else if(isset($btnSalvar)){
            header ("Location: ../../medico.php?id=".$_POST['codPaciente']."#declaracao");
            $Declaracao->cadastrarDeclaracao($Declaracao);
        }
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

?>