<?php 

//inclui as variaveis da pagina "produtos-cadastrados.php"
require_once ('../../../conexao.php');
$codusuario = filter_input(INPUT_GET,'id');
try{

    //consulta para deletar dados abaixo  
    $sql = "DELETE FROM tbusuario WHERE codusuario = '$codusuario'";

    if(mysqli_query($connect, $sql)):
        header("Location: ../../medicos-cadastrados.php");
    else:
        header("Location: ../../medicos-cadastrados.php");
    endif;
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
