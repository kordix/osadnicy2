<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once 'db.php';

// $dbh = null;

$dane = json_decode(file_get_contents('php://input'));

// $tabela = $dane->tabela;
// $id = $dane->id;

//REPLACE
$query_run = $dbh->prepare("SELECT * FROM users join stats on users.id = stats.id where users.id = 1");
$query_run->execute();

class dummy {}

$rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");


$results=[];

$id = 1;
$time = $rows[0]->updated_at;

$d1 = new DateTime($time);
$d2 = new DateTime();

echo date();

$interval = $d1->diff($d2);
$diffInSeconds = $interval->s + $interval->i * 60 + $interval->h * 3600; 

// echo $interval->i ;



$wood = $rows[0]->wood;
$woodfactor = $rows[0]->woodfactor;
$stone = $rows[0]->stone;
$stonefactor = $rows[0]->stonefactor;
$iron = $rows[0]->iron;
$ironfactor = $rows[0]->ironfactor;

$woodamount = $diffInSeconds * $woodfactor;
$stoneamount = $diffInSeconds * $stonefactor;
$ironamount = $diffInSeconds * $ironfactor;

$woodnew = $wood + $woodamount;
$stonenew = $stone + $stoneamount;
$ironamount = $iron + $ironamount;




$query2 = $dbh->prepare("update stats set wood= $woodnew, stone = $stonenew , iron = $ironamount , updated_at = now() where id = 1");
$query2->execute();

echo $query2;



// echo $woodamount;


// Stat::find($id) ->update([
    // 'wood' => $wood += $woodamount,
    // 'stone' => $stone += $stoneamount,
    // 'iron' => $iron += $ironamount,
// ]);
