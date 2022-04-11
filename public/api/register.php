<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;


require_once('db.php');

$dane = json_decode(file_get_contents('php://input'));

$login = "'".$dane->login."'";
$password = md5($dane->password);

$query = "INSERT INTO users (login,password) VALUES ($login,'$password');";

$query2 = "INSERT INTO `stats` (`id`, `wood`, `stone`, `iron`, `gold`, `woodLevel`, `stoneLevel`, `ironLevel`, `woodStore`, `stoneStore`, `ironStore`, `created_at`, `updated_at`, `stonefactor`, `woodfactor`, `goldfactor`, `ironfactor`, `heroLevel`, `heroQuest`, `questTime`, `questDTime`) VALUES
(default, 300.00, 300.00, 300.00, 0, 1.00, 1.00, 1.00, 1, 1, 1, now(), now(), 0.01, 0.01, 0.01, 0.01, 1, '0', default, default);";

$sth = $dbh->prepare($query);
if ($sth->execute() == false) {
    echo 'error';
}


$sth = $dbh->prepare($query2);
if ($sth->execute() == false) {
    echo 'error';
} else {
    echo 'SUCCESS';
}

?>



