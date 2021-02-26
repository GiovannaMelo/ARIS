<?php

$pdo = new PDO('mysql:host=localhost;dbname=bdAris;port=3306;charset=utf8', 'root', '');


$sqlCountPaciente = "SELECT count(codPaciente)FROM tbPaciente";

$statement = $pdo->prepare($sqlCountPaciente);

$statement->execute();


while ($results = $statement->fetch(PDO::FETCH_ASSOC)){
    $result = $results;
}


echo json_encode($result);
