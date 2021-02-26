<?php
$pdo = new PDO('mysql:host=localhost;dbname=bdAris;port=3306;charset=utf8', 'root', '');

$ano = date("Y");

$sqlPacienteMensal = "SELECT count(codPaciente) FROM tbPaciente WHERE MONTH(dataCadastroPaciente) = 12 AND YEAR(dataCadastroPaciente) = $ano";


$statement = $pdo->prepare($sqlPacienteMensal);

$statement->execute();

while ($results = $statement->fetch(PDO::FETCH_ASSOC)){
    $result = $results;
}

echo json_encode($result);


?>