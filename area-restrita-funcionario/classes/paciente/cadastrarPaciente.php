<?php
    require_once ('../Paciente.php');
    require_once ('../Pessoa.php');
    try {
        $Paciente = new Paciente ();

        header('Location: ../../../area-restrita-funcionario/funcionario.php');
        date_default_timezone_set('America/Sao_Paulo');
        $dataCadastro = date('d-m-Y');
        $dataConvertida = date('Y-m-d',strtotime($dataCadastro));


        //Pessoa
        $Paciente->setNumCartaoSusPaciente($_POST['numCartaoSusPaciente']);
        $Paciente->setNomePessoa($_POST['nomePaciente']);
        $Paciente->setNomeSocialPessoa($_POST['nomeSocialPaciente']);
        $Paciente->setNomeMaePaciente($_POST['nomeMaePaciente']);
        $Paciente->setNomePaiPaciente($_POST['nomePaiPaciente']);
        $Paciente->setDataNascimentoPessoa($_POST['dataNascPaciente']);
        $Paciente->setSexoPessoa($_POST['sexoPaciente']);
        $Paciente->setNacionalidadePessoa($_POST['nacionalidadePaciente']);
        $Paciente->setCpfPessoa($_POST['cpfPaciente']);
        $Paciente->setRgPessoa($_POST['rgPaciente']);
        $Paciente->setOrgaoEmissorPessoa($_POST['orgaoEmissorRgPaciente']);
        $Paciente->setDataEmissaoPessoa($_POST['dataEmissaoRgPaciente']);
        $Paciente->setUfRgPessoa($_POST['ufRgPaciente']);
        $Paciente->setCidadeNascimentoPessoa($_POST['cidadeNascPaciente']);
        $Paciente->setRacaCorPessoa($_POST['racaCorPaciente']);
        $Paciente->setEscolaridadePaciente($_POST['escolaridadePaciente']);
        $Paciente->setConvenioPaciente($_POST['convenioPaciente']);
        $Paciente->setStatusFamiliarPaciente($_POST['statusFamiliarPaciente']);
        $Paciente->setDataCadastroPaciente($dataConvertida);

        //Contato 
        $Paciente->setCelularPessoa($_POST['celularPaciente']);
        $Paciente->setTelefonePessoa($_POST['telefonePaciente']);
        $Paciente->setEmailPessoa($_POST['emailPaciente']);
        
        //Endereco
        $Paciente->setCepPessoa($_POST['cepPaciente']);
        $Paciente->setTipoLogradouroPessoa($_POST['tipoLogradouroPaciente']);
        $Paciente->setLogradouroPessoa($_POST['logradouroPaciente']);
        $Paciente->setNumCasaPessoa($_POST['numCasaPaciente']);
        $Paciente->setComplementoPessoa($_POST['complementoPaciente']);
        $Paciente->setBairroPessoa($_POST['bairroPaciente']);
        $Paciente->setCidadePessoa($_POST['cidadePaciente']);
        $Paciente->setEstadoPessoa($_POST['estadoPaciente']);


        $Paciente->cadastrar($Paciente);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>