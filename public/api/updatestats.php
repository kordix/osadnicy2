<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST') return;
session_start();


require_once 'db.php';

// $dbh = null;

$dane = json_decode(file_get_contents('php://input'));

// $tabela = $dane->tabela;
// $id = $dane->id;

//REPLACE
$id = $_SESSION['id'];

echo $id;

$query = "SELECT users.id,users.login,stats.* FROM users join stats on users.id = stats.id where users.id = $id";

echo $query;

$query_run = $dbh->prepare($query);
$query_run->execute();



class dummy {}

$rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");

print_r($rows);


$time = $rows[0]->updated_at;

$d1 = new DateTime($time);
$d2 = new DateTime();

echo date();

$interval = $d1->diff($d2);
$diffInSeconds = $interval->s + $interval->i * 60 + $interval->h * 3600 + $interval->d * 3600 * 24; 

// echo $interval->i ;



$wood = $rows[0]->wood;
$woodfactor = $rows[0]->woodfactor;
$stone = $rows[0]->stone;
$stonefactor = $rows[0]->stonefactor;
$iron = $rows[0]->iron;
$ironfactor = $rows[0]->ironfactor;

echo $diffInSeconds;

if ($diffInSeconds > 0) {
    $woodamount = $diffInSeconds * $woodfactor;
    $stoneamount = $diffInSeconds * $stonefactor;
    $ironamount = $diffInSeconds * $ironfactor;

    $woodnew = $wood + $woodamount;
    $stonenew = $stone + $stoneamount;
    $ironamount = $iron + $ironamount;




    $query2 = $dbh->prepare("update stats set wood= $woodnew, stone = $stonenew , iron = $ironamount , updated_at = now() where id = $id");
    $query2->execute();

    echo $query2;
}


?>
