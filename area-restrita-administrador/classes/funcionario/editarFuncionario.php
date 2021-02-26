<?php
    require_once ('../Funcionario.php');
    try {
        header ("Location: ../../funcionarios-cadastrados.php");
        $Funcionario = new Funcionario;

        $Funcionario->setCodFuncionario($_POST['id']);
        $Funcionario->setTipoFuncionario($_POST['tipoFuncionario']);

        $Funcionario->setCpfPessoa($_POST['cpfFuncionario']);
        $Funcionario->setNomePessoa($_POST['nomeFuncionario']);
        $Funcionario->setNomeSocialPessoa($_POST['nomeSocialFuncionario']);
        $Funcionario->setDataNascimentoPessoa($_POST['dataNascimentoFuncionario']);
        $Funcionario->setSexoPessoa($_POST['sexoFuncionario']);
        $Funcionario->setNacionalidadePessoa($_POST['nacionalidadeFuncionario']);
        $Funcionario->setRgPessoa($_POST['rgFuncionario']);
        $Funcionario->setOrgaoEmissorPessoa($_POST['rgOrgaoFuncionario']);
        $Funcionario->setDataEmissaoPessoa($_POST['dataRgOrgaoFuncionario']);
        $Funcionario->setUfRgPessoa($_POST['ufRgFuncionario']);
        $Funcionario->setCidadeNascimentoPessoa($_POST['municipioNascFuncionario']);
        $Funcionario->setRacaCorPessoa($_POST['racaCorFuncionario']);

        //Contato 
        $Funcionario->setCelularPessoa($_POST['numeroCelularFuncionario']);
        $Funcionario->setTelefonePessoa($_POST['numeroTelefoneFuncionario']);
        $Funcionario->setEmailPessoa($_POST['emailFuncionario']);

        //Endereco
        $Funcionario->setCepPessoa($_POST['cepFuncionario']);
        $Funcionario->setTipoLogradouroPessoa($_POST['tipoLogradouroFuncionario']);
        $Funcionario->setLogradouroPessoa($_POST['logradouroFuncionario']);
        $Funcionario->setNumCasaPessoa($_POST['numCasaFuncionario']);
        $Funcionario->setComplementoPessoa($_POST['complementoFuncionario']);
        $Funcionario->setBairroPessoa($_POST['bairroFuncionario']);
        $Funcionario->setCidadePessoa($_POST['municipioFuncionario']);
        $Funcionario->setEstadoPessoa($_POST['estadoLogradouroFuncionario']);

        $Funcionario->editar($Funcionario);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>