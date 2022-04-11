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

$query_run = $dbh->prepare("SELECT * FROM users join stats on users.id = stats.id where users.id = $id");
$query_run->execute();

class dummy {}

$rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");


$results=[];

echo json_encode($rows[0]);
