<?php
    require_once ('Medico.php');
    try {
        header ("Location: ../../medicos-cadastrados.php");
        $Medico = new Medico;

        $Medico->setCodMedico(filter_input(INPUT_GET,'id'));

        $Medico->excluir($Medico);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>