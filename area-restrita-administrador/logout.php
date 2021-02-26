<?php
    include_once ('Conexao.php');
    session_start();
    unset($_SESSION['login-session']);
    unset($_SESSION['senha-session']);
    unset($_SESSION['tipo-session']);
    session_destroy();
    header("Location: ../index.php");
    exit();
?>