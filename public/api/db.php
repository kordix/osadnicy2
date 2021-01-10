<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;


require_once '../../cred.php';


try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
}
catch(PDOException $exception){
    // http_response_code(400);
    return http_response_code(500);

    echo "Connection error: " . $exception->getMessage();
}


$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
ini_set('mssql.charset', 'UTF-8');



 ?>
