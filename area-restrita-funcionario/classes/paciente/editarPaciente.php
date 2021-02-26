<?php
    require_once ('../Paciente.php');
    try {
        $Paciente = new Paciente;
        header('Location: ../../../area-restrita-funcionario/funcionario.php?id='.$_POST['id']);

        //Pessoa
        $Paciente->setCodPaciente($_POST['id']);
        $Paciente->setNumCartaoSusPaciente($_POST['numCartaoSusPacienteAlteracao']);
        $Paciente->setNomePessoa($_POST['nomePacienteAlteracao']);
        $Paciente->setNomeSocialPessoa($_POST['nomeSocialPacienteAlteracao']);
        $Paciente->setNomeMaePaciente($_POST['nomeMaePacienteAlteracao']);
        $Paciente->setNomePaiPaciente($_POST['nomePaiPacienteAlteracao']);
        $Paciente->setDataNascimentoPessoa($_POST['dataNascPacienteAlteracao']);
        $Paciente->setSexoPessoa($_POST['sexoPacienteAlteracao']);
        $Paciente->setNacionalidadePessoa($_POST['nacionalidadePacienteAlteracao']);
        $Paciente->setCpfPessoa($_POST['cpfPacienteAlteracao']);
        $Paciente->setRgPessoa($_POST['rgPacienteAlteracao']);
        $Paciente->setOrgaoEmissorPessoa($_POST['orgaoEmissorRgPacienteAlteracao']);
        $Paciente->setDataEmissaoPessoa($_POST['dataEmissaoRgPacienteAlteracao']);
        $Paciente->setUfRgPessoa($_POST['ufRgPacienteAlteracao']);
        $Paciente->setCidadeNascimentoPessoa($_POST['municipioNascPacienteAlteracao']);
        $Paciente->setRacaCorPessoa($_POST['racaCorPacienteAlteracao']);
        $Paciente->setEscolaridadePaciente($_POST['escolaridadePacienteAlteracao']);
        $Paciente->setConvenioPaciente($_POST['convenioPacienteAlteracao']);
        $Paciente->setStatusFamiliarPaciente($_POST['statusFamiliarPacienteAlteracao']);

        //Contato 
        $Paciente->setCelularPessoa($_POST['celularPacienteAlteracao']);
        $Paciente->setTelefonePessoa($_POST['telefonePacienteAlteracao']);
        $Paciente->setEmailPessoa($_POST['emailPacienteAlteracao']);
        
        //Endereco
        $Paciente->setCepPessoa($_POST['cepPacienteAlteracao']);
        $Paciente->setTipoLogradouroPessoa($_POST['tipoLogradouroPacienteAlteracao']);
        $Paciente->setLogradouroPessoa($_POST['logradouroPacienteAlteracao']);
        $Paciente->setNumCasaPessoa($_POST['numCasaPacienteAlteracao']);
        $Paciente->setComplementoPessoa($_POST['complementoPacienteAlteracao']);
        $Paciente->setBairroPessoa($_POST['bairroPacienteAlteracao']);
        $Paciente->setCidadePessoa($_POST['municipioPacienteAlteracao']);
        $Paciente->setEstadoPessoa($_POST['estadoPacienteAlteracao']);

        $Paciente->editar($Paciente);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>