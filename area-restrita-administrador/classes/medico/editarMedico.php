<?php
    require_once ('../Medico.php');
    try {
        //header ("Location: ../../medicos-cadastrados.php");
        $Medico = new Medico;

        $Medico->setCodMedico($_POST['id']);
        $Medico->setCrmMedico($_POST['crmMedico']);
        $Medico->setEspecialidadeMedico($_POST['especialidadeMedico']);

        $Medico->setCpfPessoa($_POST['cpfMedico']);
        $Medico->setNomePessoa($_POST['nomeMedico']);
        $Medico->setNomeSocialPessoa($_POST['nomeSocialMedico']);
        $Medico->setDataNascimentoPessoa($_POST['dataNascimentoMedico']);
        $Medico->setSexoPessoa($_POST['sexoMedico']);
        $Medico->setNacionalidadePessoa($_POST['nacionalidadeMedico']);
        $Medico->setRgPessoa($_POST['rgMedico']);
        $Medico->setOrgaoEmissorPessoa($_POST['rgOrgaoMedico']);
        $Medico->setDataEmissaoPessoa($_POST['dataRgOrgaoMedico']);
        $Medico->setUfRgPessoa($_POST['ufRgMedico']);
        $Medico->setCidadeNascimentoPessoa($_POST['municipioNascMedico']);
        $Medico->setRacaCorPessoa($_POST['racaCorMedico']);

        //Contato 
        $Medico->setCelularPessoa($_POST['numeroCelularMedico']);
        $Medico->setTelefonePessoa($_POST['numeroTelefoneMedico']);
        $Medico->setEmailPessoa($_POST['emailMedico']);

        //Endereco
        $Medico->setCepPessoa($_POST['cepMedico']);
        $Medico->setTipoLogradouroPessoa($_POST['tipoLogradouroMedico']);
        $Medico->setLogradouroPessoa($_POST['logradouroMedico']);
        $Medico->setNumCasaPessoa($_POST['numCasaMedico']);
        $Medico->setComplementoPessoa($_POST['complementoMedico']);
        $Medico->setBairroPessoa($_POST['bairroMedico']);
        $Medico->setCidadePessoa($_POST['municipioMedico']);
        $Medico->setEstadoPessoa($_POST['estadoLogradouroMedico']);

        $Medico->editar($Medico);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>