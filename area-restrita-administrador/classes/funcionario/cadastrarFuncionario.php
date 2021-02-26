<?php
    require_once ('../Funcionario.php');
    require_once ('../Pessoa.php');
    try {
        header ("Location: ../../funcionarios-cadastrados.php");
        $Funcionario = new Funcionario;

        //Pessoa
        $Funcionario->setCpfPessoa($_POST['cpfFuncionario']);
        $Funcionario->setNomePessoa($_POST['nomeFuncionario']);
        $Funcionario->setNomeSocialPessoa($_POST['nomeSocialFuncionario']);
        $Funcionario->setDataNascimentoPessoa($_POST['dataNascimentoFuncionario']);
        $Funcionario->setSexoPessoa($_POST['sexoFuncionario']);
        $Funcionario->setNacionalidadePessoa($_POST['nacionalidadeFuncionario']);
        $Funcionario->setRgPessoa($_POST['rgFuncionario']);
        $Funcionario->setOrgaoEmissorPessoa($_POST['rgOrgaoFuncionario']);
        $Funcionario->setDataEmissaoPessoa($_POST['dataEmissorRgFuncionario']);
        $Funcionario->setUfRgPessoa($_POST['ufFuncionario']);
        $Funcionario->setCidadeNascimentoPessoa($_POST['cidadeNascFuncionario']);
        $Funcionario->setRacaCorPessoa($_POST['racaCorFuncionario']);
        $Funcionario->setTipoFuncionario($_POST['tipoFuncionario']);

        //Contato 
        $Funcionario->setCelularPessoa($_POST['celularFuncionario']);
        $Funcionario->setTelefonePessoa($_POST['telefoneFuncionario']);
        $Funcionario->setEmailPessoa($_POST['emailFuncionario']);

        //Endereco
        $Funcionario->setCepPessoa($_POST['cepFuncionario']);
        $Funcionario->setTipoLogradouroPessoa($_POST['tipoLogradouroFuncionario']);
        $Funcionario->setLogradouroPessoa($_POST['logradouroFuncionario']);
        $Funcionario->setNumCasaPessoa($_POST['numCasaFuncionario']);
        $Funcionario->setComplementoPessoa($_POST['complementoFuncionario']);
        $Funcionario->setBairroPessoa($_POST['bairroFuncionario']);
        $Funcionario->setCidadePessoa($_POST['cidadeFuncionario']);
        $Funcionario->setEstadoPessoa($_POST['estadoFuncionario']);


        $Funcionario->cadastrar($Funcionario);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>