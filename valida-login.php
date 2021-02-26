<?php
    session_start();
    if(!$_SESSION['login-session'] ){
    }else if(!$_SESSION['senha-session'] ){
        header ("Location: ../index.php");
    }
?>