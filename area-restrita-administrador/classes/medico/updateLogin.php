<?php

session_start();
//conexao com banco
require_once ('../Medico.php');

//pegando os dados
if(isset($_POST['btnAtualizar'])){
    try {
        header ("Location: ../../gerenciar-login.php");
        $Medico = new Medico;

        $Medico->setNomeCompletoUsuario($_POST['nomeCompleto']);
        $Medico->setNomeUsuario($_POST['nome']);
        $Medico->setCodUsuario($_POST['codUsuario']);
        $Medico->setSenhaUsuario(md5($_POST['senha']));

        $Medico->editarLogin($Medico);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
}
?>
