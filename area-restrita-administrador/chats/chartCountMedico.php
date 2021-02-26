<?php
$pdo = new PDO('mysql:host=localhost;dbname=bdAris;port=3306;charset=utf8', 'root', '');


$sqlCountMedico = "SELECT count(codMedico)FROM tbMedico";

$statement = $pdo->prepare($sqlCountMedico);

$statement->execute();


while ($results = $statement->fetch(PDO::FETCH_ASSOC)){
    $result = $results;
}


echo json_encode($result);


?>