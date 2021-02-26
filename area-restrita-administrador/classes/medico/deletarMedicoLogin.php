<?php 

//inclui as variaveis da pagina "produtos-cadastrados.php"
require_once ('../Conexao.php');
require_once ('../Medico.php');

$codusuario = filter_input(INPUT_GET,'id');
try{
    $Medico = new Medico;

    $Medico->setCodUsuario($codusuario);
    $Medico->excluirLogin($Medico);
        header("Location: ../../gerenciar-login.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
