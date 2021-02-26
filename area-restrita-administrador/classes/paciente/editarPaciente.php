<?php
    require_once ('Paciente.php');
    try {
        header ("Location: ../../pacientes-cadastrados.php");

        $Paciente = new Paciente;

        $Paciente->setCodPaciente($_POST['id']);
        $Paciente->setNomePaciente($_POST['nomePaciente']);
        $Paciente->setNomeSocialPaciente($_POST['nomeSocialPaciente']);
        $Paciente->setDataNascimentoPaciente($_POST['dataNascimentoPaciente']);
        $Paciente->setRgPaciente($_POST['rgPaciente']);
        $Paciente->setCpfPaciente($_POST['cpfPaciente']);
        $Paciente->setSexoPaciente($_POST['sexoPaciente']);
        $Paciente->setNumCartaoSusPaciente($_POST['numCartaoSusPaciente']);
        $Paciente->setNacionalidadePaciente($_POST['nacionalidadePaciente']);
        $Paciente->setNomeMaePaciente($_POST['nomeMaePaciente']);
        $Paciente->setLogradouroPaciente($_POST['logradouroPaciente']);
        $Paciente->setCidadePaciente($_POST['cidadePaciente']);
        $Paciente->setBairroPaciente($_POST['bairroPaciente']);
        $Paciente->setCepPaciente($_POST['cepPaciente']);
        $Paciente->setNumCasaPaciente($_POST['numCasaPaciente']);
        $Paciente->setMunicipioPaciente($_POST['municipioPaciente']);
        $Paciente->setTipoLogradouroPaciente($_POST['tipoLogradouroPaciente']);
        $Paciente->setReferenciaLogradouro($_POST['referenciaPaciente']);
        $Paciente->setComplementoPaciente($_POST['complementoPaciente']);
        $Paciente->setEmail($_POST['emailPaciente']);

        $Paciente->editar($Paciente);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>