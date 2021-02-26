<?php
    require_once ('Funcionario.php');
    try {
        header ("Location: ../../funcionarios-cadastrados.php");
        $funcionario = new Funcionario;

        $funcionario->setNomeFuncionario($_POST['nomefuncionario']);
        $funcionario->setDataNascimentoFuncionario($_POST['datanascimentofuncionario']);
        $funcionario->setCpfFuncionario($_POST['cpffuncionario']);
        $funcionario->setRgFuncionario($_POST['rgfuncionario']);
        $funcionario->setTipoFuncionario($_POST['tipofuncionario']);
        $funcionario->setNumeroTelefoneFuncionario($_POST['telefonefuncionario']);

        $funcionario->cadastrar($funcionario);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>