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
    <title>Dashboard | <?= $title ?></title>
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
                
               
<div class="collections section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-tab">
                     <h4 class="card-title mb-3">Invest Plan Listing </h4>
                        <div class="row">
                             <?php
                            $sql = "SELECT * FROM `or_settings_joining`  ORDER BY `id`";
                            $res = query($conn, $sql);

                            while ($fetch = fetcharray($res)) {
                            ?>
                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card items">
                                    <div class="card-body">
                                        <div class="items-img position-relative"><img src="images/items/17.jpg"
                                                class="img-fluid rounded mb-3" alt=""><img src="images/avatar/17.html"
                                                class="creator" width="50" alt=""></div>
                                        <a href="item.html">
                                            <h4 class="card-title"><?php echo $fetch['pack_name']   ?></h4>
                                        </a>
                                        <div class="d-flex justify-content-between">
                                            <div class="text-start">
                                                <p class="mb-2">Referral : <?php echo $fetch['direct']   ?>%</p>
                                                <p class="mb-2">Binary : <?php echo $fetch['binary']   ?> %</p>
                                            </div>
                                            <div class="text-end">
                                                <div class="user">
                                        <span class="thumb">
                                            <img src="images/profile/3.png" alt="">
                                        </span>
                                        <div class="user-info">
                                            <h5>TeslaGateway</h5>
                                        </div>
                                    </div>
                                                <h5 class="text-muted"><?php echo $fetch['joining']   ?> ETH</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3"><a href="payment.php?case=add" class="btn btn-primary">Pay Now</a></div>
                                    </div>
                                </div>
                            </div><?php  } ?>

                           
                           
                           
                           
                          
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
             
              

               

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