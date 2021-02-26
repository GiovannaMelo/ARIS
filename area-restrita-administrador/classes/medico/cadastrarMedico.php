<?php
    require_once ('../Medico.php');
    require_once ('../Pessoa.php');
    try {
        header ("Location: ../../medicos-cadastrados.php");
        $Medico = new Medico;

        //Pessoa
        $Medico->setCrmMedico($_POST['crmMedico']);
        $Medico->setNomePessoa($_POST['nomeMedico']);
        $Medico->setNomeSocialPessoa($_POST['nomeSocialMedico']);
        $Medico->setDataNascimentoPessoa($_POST['dataNascimentoMedico']);
        $Medico->setSexoPessoa($_POST['sexoMedico']);
        $Medico->setNacionalidadePessoa($_POST['nacionalidadeMedico']);
        $Medico->setCpfPessoa($_POST['cpfMedico']);
        $Medico->setRgPessoa($_POST['rgMedico']);
        $Medico->setOrgaoEmissorPessoa($_POST['rgOrgaoMedico']);
        $Medico->setDataEmissaoPessoa($_POST['dataEmissorRgMedico']);
        $Medico->setUfRgPessoa($_POST['ufMedico']);
        $Medico->setCidadeNascimentoPessoa($_POST['cidadeNascMedico']);
        $Medico->setRacaCorPessoa($_POST['racaCorMedico']);
        $Medico->setEspecialidadeMedico($_POST['especialidadeMedico']);

        //Contato 
        $Medico->setCelularPessoa($_POST['celularMedico']);
        $Medico->setTelefonePessoa($_POST['telefoneMedico']);
        $Medico->setEmailPessoa($_POST['emailMedico']);

        //Endereco
        $Medico->setCepPessoa($_POST['cepMedico']);
        $Medico->setTipoLogradouroPessoa($_POST['tipoLogradouroMedico']);
        $Medico->setLogradouroPessoa($_POST['logradouroMedico']);
        $Medico->setNumCasaPessoa($_POST['numCasaMedico']);
        $Medico->setComplementoPessoa($_POST['complementoMedico']);
        $Medico->setBairroPessoa($_POST['bairroMedico']);
        $Medico->setCidadePessoa($_POST['cidadeMedico']);
        $Medico->setEstadoPessoa($_POST['estadoMedico']);


        $Medico->cadastrar($Medico);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>