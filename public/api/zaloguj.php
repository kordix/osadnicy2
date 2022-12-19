<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;
session_start();

require_once 'db.php';

// $dbh = null;

$dane = json_decode(file_get_contents('php://input'));

$login = $dane->login;
$password = md5($dane->password);

//REPLACE
$query_run = $dbh->prepare("SELECT id,`password` FROM users where login = ?");
$query_run->execute();

$rows = $query_run->fetchAll(PDO::FETCH_ASSOC);

if (password_verify($rows[0]->password, $dane->password)){
    $_SESSION['zalogowany'] = true;
    $_SESSION['id'] = $rows[0]->id;
}


//if(count($rows)>0){
  //  $_SESSION['zalogowany'] = true;
   // $_SESSION['id'] = $rows[0]->id;

    //echo 'ZALOGOWANY';
//}else{
   // return 0;
}


//echo json_encode($rows[0]);





?>