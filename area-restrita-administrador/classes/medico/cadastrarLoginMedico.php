<?php
    require_once ('../Medico.php');
    try {
        header ("Location: ../../gerenciar-login.php");
        $Medico = new Medico;

        $Medico->setNomeCompletoUsuario($_POST['nomecompletousuario']);
        $Medico->setNomeUsuario($_POST['nomeusuario']);
        $Medico->setSenhaUsuario(md5($_POST['senhausuario']));
        $Medico->setTipoUsuario("medico");
        $Medico->setCodMedico($_POST['codmedico']);

        $Medico->cadastrarLogin($Medico);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>