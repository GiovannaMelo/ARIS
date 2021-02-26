<?php
    require_once ('Funcionario.php');
    try {
        header ("Location: ../../funcionarios-cadastrados.php");
        $funcionario = new Funcionario;

        $funcionario->setNomeCompletoUsuario($_POST['nomecompletousuario']);
        $funcionario->setNomeUsuario($_POST['nomeusuario']);
        $funcionario->setSenhaUsuario(md5($_POST['senhausuario']));
        $funcionario->setTipoUsuario("funcionario");

        $funcionario->cadastrarLogin($funcionario);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>