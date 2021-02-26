<?php
    if($_SESSION['tipo-session'] != 'administrador' ){
        header ("Location: ../index.php");
    }
?>