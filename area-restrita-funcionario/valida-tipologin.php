<?php
    if($_SESSION['tipo-session'] != 'recepcao' ){
        header ("Location: ../index.php");
    }else{
        include_once ('classes/Conexao.php');
        include_once ('classes/Funcionario.php');
            try {
                $codigo = $_SESSION['code-session'] ;


                $Funcionario = new Funcionario();
                $lista = $Funcionario->ligarLogin($codigo);
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();

            }

    }
?>