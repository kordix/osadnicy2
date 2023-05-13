<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;
session_start();

require_once 'db.php';

// $dbh = null;

$dane = json_decode(file_get_contents('php://input'));

$login = $dane->login;
$password = md5($dane->password);

//REPLACE
$query_run = $dbh->prepare("SELECT id,`password` FROM users where login = ? and password = ?");
$query_run->execute([$login,$password]);

$rows = $query_run->fetchAll(PDO::FETCH_ASSOC);

//print_r($rows[0]);
//echo $rows[0]['id'];

//echo json_encode($rows);

// if (password_verify($rows[0]->password, $dane->password)){
//     $_SESSION['zalogowany'] = true;
//     $_SESSION['id'] = $rows[0]->id;
// }


if(count($rows)>0){
    $_SESSION['zalogowany'] = true;
    $_SESSION['id'] = $rows[0]['id'];

    echo 'ZALOGOWANY';
}else{
    return 0;
}


//echo json_encode($rows[0]);





?>