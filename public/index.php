<?php
session_start();

if(!isset($_SESSION['zalogowany'])){
    header('Location: /login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osadnicy NF</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #wyloguj{
            display:block;
        }
    </style>
</head>
<body>

<div id="app">
<?php  include 'navbar.php' ?>
    
    <div  class="container" id="app">
        <gra></gra>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    

<?php include('../components/resourcetab.php') ?>
<?php include('../components/popover.php') ?>
<?php include('../components/building.php') ?>
<?php include('../components/wioska.php') ?>

<?php include('../components/gra.php') ?>




<script src="script.js"></script>

</body>
</html>