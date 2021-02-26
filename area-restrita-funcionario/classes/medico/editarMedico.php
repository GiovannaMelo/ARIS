<?php
    require_once ('Medico.php');
    try {
        header ("Location: ../../medicos-cadastrados.php");
        $Medico = new Medico;

        $Medico->setCodMedico($_POST['id']);
        $Medico->setNomeMedico($_POST['nomemedico']);
        $Medico->setCrmMedico($_POST['crmmedico']);
        $Medico->setEspecialidadeMedico($_POST['especialidademedico']);

        $Medico->editar($Medico);
    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>