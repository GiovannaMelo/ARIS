<?php
    require_once ('../Funcionario.php');
    try {
        header ("Location: ../../gerenciar-login.php");
        $funcionario = new Funcionario;
        $funcionario->setNomeCompletoUsuario($_POST['nomecompletousuario']);
        $funcionario->setNomeUsuario($_POST['nomeusuario']);
        $funcionario->setSenhaUsuario(md5($_POST['senhausuario']));
        $funcionario->setTipoUsuario("recepcao");
        $funcionario->setCodFuncionario($_POST['codfuncionario']);

        $funcionario->cadastrarLogin($funcionario);

    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>