<?php
    if($_SESSION['tipo-session'] != 'medico' ){
        header ("Location: ../index.php");
    }else{
        include_once ('classes/Conexao.php');
        include_once ('classes/Medico.php');
            try {
                $codigo = $_SESSION['code-session'] ;


                $Medico = new Medico();
                $lista = $Medico->ligarLogin($codigo);
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();

            }

    }
?>