<?php
    require_once ('../Triagem.php');
    try {

        $Triagem = new Triagem();
        date_default_timezone_set('America/Sao_Paulo');

        $dataEmissaoTriagem =  date('d-m-Y');
        $horaEmissaoTriagem = date('H:i:s');

        $dataConvertida = date('Y-m-d',strtotime($dataEmissaoTriagem));

        $Triagem->setQueixaTriagem($_POST['queixaTriagem']);
        $Triagem->setHoraEmissaoTriagem($horaEmissaoTriagem);
        $Triagem->setDataEmissaoTriagem($dataConvertida);
        $Triagem->setPressaoSitolicaTriagem($_POST['pressaoSitolicaTriagem']);
        $Triagem->setPressaoDiastolicaTriagem($_POST['pressaoDiastolicaTriagem']);
        $Triagem->setBatimentosTriagem($_POST['batimentosTriagem']);
        $Triagem->setTemperaturaTriagem($_POST['temperaturaTriagem']);
        $Triagem->setNivelDorTriagem($_POST['nivelDorTriagem']);
        $Triagem->setAlergiaTriagem($_POST['alergiaTriagem']);
        $Triagem->setObsAlergiaTriagem($_POST['obsAlergiaTriagem']);
        $Triagem->setDiabetesTriagem($_POST['diabetesTriagem']);
        $Triagem->setTipoDiabetesTriagem($_POST['tipoDiabetesTriagem']);
        $Triagem->setGravidezTriagem($_POST['gravidezTriagem']);
        $Triagem->setTempoGravidezTriagem($_POST['tempoGravidezTriagem']);
        $Triagem->setFumanteTriagem($_POST['fumanteTriagem']);
        $Triagem->setHistDoencaTriagem($_POST['histDoencaTriagem']);
        $Triagem->setObsHistDoencaTriagem($_POST['obsDoencaTriagem']);
        $Triagem->setcodPaciente($_POST['pacienteEscolhido']);
        
        header ("Location: ../../enfermeiro.php");



        $Triagem->cadastrar($Triagem);

    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

?>