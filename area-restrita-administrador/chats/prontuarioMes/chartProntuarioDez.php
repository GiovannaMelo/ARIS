<?php
$pdo = new PDO('mysql:host=localhost;dbname=bdAris;port=3306;charset=utf8', 'root', '');

$ano = date("Y");

$sqlProntuarioMensal = "SELECT count(codProntuario) FROM tbprontuario WHERE MONTH(dataProntuario) = 12 AND YEAR(dataProntuario) = $ano";


$statement = $pdo->prepare($sqlProntuarioMensal);

$statement->execute();

while ($results = $statement->fetch(PDO::FETCH_ASSOC)){
    $result = $results;
}

echo json_encode($result);


?>