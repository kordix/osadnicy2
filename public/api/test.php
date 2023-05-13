<?php

if($_SERVER['REQUEST_METHOD'] != 'POST') return;



echo $_SERVER["HTTP_REFERER"];

$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
?>