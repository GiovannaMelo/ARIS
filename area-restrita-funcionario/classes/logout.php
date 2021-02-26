<?php
    include_once ('Conexao.php');
    include_once ('Funcionario.php');
    session_start();
    try {
        $codigo = $_SESSION['code-session'] ;


        $Funcionario = new Funcionario();
        $lista = $Funcionario->desligarLogin($codigo);
    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();

    }
    unset($_SESSION['login-session']);
    unset($_SESSION['senha-session']);
    unset($_SESSION['tipo-session']);
    unset($_SESSION['code-session']);
    unset($_SESSION['status-session']);
    session_destroy();
    header("Location: ../../index.php");
    exit();
?>