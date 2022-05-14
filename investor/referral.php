<?php
session_start();
include('../administrator/includes/function.php');
include('header/header.php');

if (!isset($_SESSION['mid'])) {
    redirect('../index.php');
}
$userid = getMember($conn, $_SESSION['mid'], 'userid');
$paystatus = getMember($conn, $_SESSION['mid'], 'paystatus');

include('calculate-matching-bonus.php');
include('calculate-recharge-release.php');
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invite Earn | <?= $title ?></title>
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
                
               
<div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Share with your friends and earn  <i data-feather="user-plus"></i> </h2>
            </div>
            <!-- /Title -->
        </div>
        <div class="row">

            <div class="col-md-12">
                <?php if ($paystatus == 'A') { ?>
                    <div class="row">
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h5 align="center" style="background-color: rgb(187 0 0); height:40px; color:#FFFFFF;font-size:20px;padding: 10px;"><strong style="color: #ffffff;">Referral Link</strong></h5>
                            <div class="card-body">
                                <div align="center">
                                    <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?= $weblink ?>/introducer.php?intr=<?= $userid ?>&choe=UTF-8" title="" />
                                </div>

                                <h5 align="center" style="background-color:rgb(187 0 0);margin-top: 10px; height:52px; color:#FFFFFF;font-size:16px;padding: 10px;"><input type="text" style="width:400px;" id="p1" value="<?= $weblink ?>/introducer.php?intr=<?= $userid ?>"></h5> </br>
                                <div align="center"><button onClick="copyToClipboard('#p1')" style="background-color:rgb(187 0 0);" id="cpbutton" class="btn btn-primary">COPY LINK</button></div>

                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>

        <script>


            function copyToClipboard(element) {


                var copyText = document.getElementById('p1')
                copyText.select();
                document.execCommand('copy')

                document.getElementById('cpbutton').innerHTML = 'COPIED';





            }
        </script>




               

            </div>
        </div>
    </div>


    
</div>





<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>






<script src="vendor/chartjs/chart.bundle.min.js"></script>


<script src="js/plugins/chartjs-line-init.js"></script>




<script src="js/plugins/chartjs-donut.js"></script>








<script src="js/scripts.js"></script>


</body>

</html>