<?php
$pdo = new PDO('mysql:host=localhost;dbname=bdAris;port=3306;charset=utf8', 'root', '');

$sqlCountFuncionario = "SELECT count(codFuncionario)FROM tbFuncionario";

$statement = $pdo->prepare($sqlCountFuncionario);

$statement->execute();


while ($results = $statement->fetch(PDO::FETCH_ASSOC)){
    $result = $results;
}


echo json_encode($result);


?>