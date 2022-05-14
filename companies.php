<?php
session_start();
include('../administrator/includes/function.php');

$userid = getMember($conn, $_SESSION['mid'], 'userid');
$paystatus = getMember($conn, $_SESSION['mid'], 'paystatus');

if (!isset($_SESSION['mid'])) {
    redirect('../index.php');
}
$userid = getMember($conn, $_SESSION['mid'], 'userid');
$paystatus = getMember($conn, $_SESSION['mid'], 'paystatus');
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Companies | <?= $title ?></title>
    <meta name="description"
        content="Dashboard">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper" class="admin">

   
   
   <?php include'includes/left-side.php'; ?>

               

           
    <div class="content-body">
        <div class="container">
            <div class="row">
               
              
               




               

            </div>
        </div>
    </div>


    
</div>


   <?php include'includes/footer.php'; ?>
