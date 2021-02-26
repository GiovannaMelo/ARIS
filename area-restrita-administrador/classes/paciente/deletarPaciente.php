<?php
    require_once ('Paciente.php');
    try {
        header ("Location: ../../pacientes-cadastrados.php");
        $Paciente = new Paciente;

        $Paciente->setCodPaciente(filter_input(INPUT_GET,'id'));

        $Paciente->excluir($Paciente);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>