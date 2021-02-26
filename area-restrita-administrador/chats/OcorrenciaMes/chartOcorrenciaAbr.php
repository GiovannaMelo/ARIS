<?php
$pdo = new PDO('mysql:host=localhost;dbname=bdAris;port=3306;charset=utf8', 'root', '');

$ano = date("Y");

$sqlOcorrenciaMensal = "SELECT count(codOcorrencia) FROM tbOcorrencia WHERE MONTH(dataOcorrencia) = 4 AND YEAR(dataOcorrencia) = $ano";


$statement = $pdo->prepare($sqlOcorrenciaMensal);

$statement->execute();

while ($results = $statement->fetch(PDO::FETCH_ASSOC)){
    $result = $results;
}

echo json_encode($result);


?>