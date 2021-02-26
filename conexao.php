<?php

$servidor = "localhost";
$banco = "bdaris";
$usuario = "root";
$senha = "";

$connect = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_error()):
  echo "Error connecting: ".mysqli_connect_error();
endif;  

?>