<?php
    require_once ('../Receita.php');
    try {
        $btnSalvar = $_POST['btnSalvar'];
        $btnImprimir = $_POST['btnImprimir'];
        
        

        $Receita = new Receita();

        $Receita->setCodPaciente($_POST['codPaciente']);
        $Receita->setCodMedico($_POST['codMedico']);
        $Receita->setMedicamentoReceita($_POST['medicamentoReceita']);
        $Receita->setQtdMedicamentoreceita($_POST['qtdMedicamentoReceita']);
        $Receita->setUnidadeMedicamentoReceita($_POST['unidadeMedicamentoReceita']);
        $Receita->setTempoMedicamentoReceita($_POST['tempoMedicamentoReceita']);
        $Receita->setDiasMedicamentoReceita($_POST['diasMedicamentoReceita']);
        $Receita->setAdminMedicamentoReceita($_POST['adminMedicamento']);

        $Receita->setMedicamentoReceita2($_POST['medicamentoReceita2']);
        $Receita->setQtdMedicamentoreceita2($_POST['qtdMedicamentoReceita2']);
        $Receita->setUnidadeMedicamentoReceita2($_POST['unidadeMedicamentoReceita2']);
        $Receita->setTempoMedicamentoReceita2($_POST['tempoMedicamentoReceita2']);
        $Receita->setDiasMedicamentoReceita2($_POST['diasMedicamentoReceita2']);
        $Receita->setAdminMedicamentoReceita2($_POST['adminMedicamento2']);
        
        $Receita->setValidadeReceita($_POST['validadeReceita']);


        if(isset($btnImprimir)){
            echo"teste";
            session_start();
            $_SESSION['paciente-session'] = $_POST['codPaciente'];
            echo $_SESSION['paciente-session'];
            header ("Location: pdf-receita.php");
            exit();
            header ("Location: ../../medico.php?id=".$_POST['codPaciente']."#receita");

            $Receita->cadastrarReceita($Receita);

        }else if(isset($btnSalvar)){
            header ("Location: ../../medico.php?id=".$_POST['codPaciente']."#receita");
            $Receita->cadastrarReceita($Receita);
            
        }

    }catch(Exception $e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

?>