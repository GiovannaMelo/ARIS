<?php
//Incluindo as classes
include_once ('../Conexao.php');
require_once ('../Anamnese.php'); 

try {
    header ("Location: ../../enfermeiro.php?id=".$_POST['pacienteEscolhido']."#anamnese");




    $Anamnese = new Anamnese();

    $codPacienteAmnesia = $_POST['pacienteEscolhido'];
    $Anamnese->setCodPaciente($codPacienteAmnesia);
    $Anamnese->setTratamentoMedico($_POST['tratamentoMedico']);
    $Anamnese->setObsTratamentoMedico($_POST['obsTratamentoMedico']);
    $Anamnese->setAlergia($_POST['alergia']);
    $Anamnese->setObsAlergia($_POST['obsAlergia']);
    $Anamnese->setAntCirurgico($_POST['antCirurgia']);
    $Anamnese->setObsAntCirugico($_POST['obsAntCirurgia']);
    $Anamnese->setProblemaPele($_POST['problemaPele']);
    $Anamnese->setObsProblemaPele($_POST['obsProblemaPele']);
    $Anamnese->setGestante($_POST['gestante']);
    $Anamnese->setObsGestante($_POST['obsGestante']);
    $Anamnese->setProblemaOrtopedico($_POST['problemaOrtopedico']);
    $Anamnese->setObsProblemaOrtopedico($_POST['obsProblemaOrtopedico']);
    $Anamnese->setDiabete($_POST['diabete']);
    $Anamnese->setTipoDiabete($_POST['tipoDiabete']);
    $Anamnese->setControleDiabete($_POST['controleDiabete']);
    $Anamnese->setTumor($_POST['tumor']);
    $Anamnese->setObsTumor($_POST['obsTumor']);
    $Anamnese->setProtese($_POST['protese']);
    $Anamnese->setObsProtese($_POST['obsProtese']);
    $Anamnese->setCicloMestrual($_POST['cicloMenstrual']);
    $Anamnese->setFumante($_POST['fumante']);
    $Anamnese->setMarcaPasso($_POST['marcaPasso']);
    $Anamnese->setAlteracaoCardiaca($_POST['alteracaoCardiaca']);
    $Anamnese->setDisturbioCirculatorio($_POST['disturbioCirculatorio']);
    $Anamnese->setDisturbioRenal($_POST['disturbioRenal']);
    $Anamnese->setDisturbioHormonal($_POST['disturbioHormonal']);
    $Anamnese->setEpiletico($_POST['epiletico']);
    $Anamnese->setHipoHipertensao($_POST['hipoHipertensao']);
    $Anamnese->setFilhos($_POST['filhos']);
    $Anamnese->setFuncIntestinal($_POST['funcIntestinal']);
    $Anamnese->setNomePrimeiroContato($_POST['nomePrimeiroContato']);
    $Anamnese->setTelPrimeiroContato($_POST['telPrimeiroContato']);
    $Anamnese->setCelPrimeiroContato($_POST['celPrimeiroContato']);
    $Anamnese->setNomeSegundoContato($_POST['nomeSegundoContato']);
    $Anamnese->setTelSegundoContato($_POST['telSegundoContato']);
    $Anamnese->setCelSegundoContato($_POST['celSegundoContato']);
        

    $Anamnese->cadastrar($Anamnese);
    
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}


?> 
