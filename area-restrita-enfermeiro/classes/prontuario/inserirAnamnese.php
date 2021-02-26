<?php
//Incluindo as classes
include_once ('../Conexao.php');
require_once ('../Prontuario.php'); 
require_once ('../Anamnese.php'); 

try {
    
    //header ("Location: ../../enfermeiro.php");

    $Prontuario = new Prontuario();
    $Anamnese = new Anamnese();

    $cod = filter_input(INPUT_GET, "id");

    $lista=$Anamnese->listar($cod);
    foreach($lista as $linha){
        $codAnamnese = $linha['codAnamnese'];
    }
    $Prontuario->setCodAnamnese($codAnamnese);
    $Prontuario->setCodPaciente($cod);

    
    $Prontuario->cadastrarAnamneseProntuario($Prontuario);
    
} catch(Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?> 
