<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;
session_start();

require_once 'db.php';

// $dbh = null;

$dane = json_decode(file_get_contents('php://input'));

$login = $dane->login;
$password = md5($dane->password);

//REPLACE
$query_run = $dbh->prepare("SELECT id FROM users where login = '$login' and password = '$password'");
$query_run->execute();

class dummy {}

$rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");

if(count($rows)>0){
    $_SESSION['zalogowany'] = true;
    echo 'ZALOGOWANY';
}else{
    return 0;
}


//echo json_encode($rows[0]);





?>