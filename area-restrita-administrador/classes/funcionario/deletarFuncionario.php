<?php
    require_once ('../Funcionario.php');
    try {
        header ("Location: ../../funcionarios-cadastrados.php");
        $funcionario = new Funcionario;

        $funcionario->setCodFuncionario(filter_input(INPUT_GET,'id'));

        $funcionario->excluir($funcionario);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>