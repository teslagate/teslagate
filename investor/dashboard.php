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
                <div class="col-xxl-12">
                    <div class="promotion d-flex justify-content-between align-items-center">

                        <div class="promotion-detail">
                            <h3 class="text-white mb-3">Choose your investment NFT and win</h3>
                            <p>Try the new generation earning system with B2I now!</p><a href="plan.php" 
                                class="btn btn-primary me-3">Investment Discover</a>
                                 <?php
                $sql = "SELECT * FROM `or_announcement` ORDER BY `id` DESC";
                $res = query($conn, $sql);
                $num = numrows($res);
                if ($num > 0) { ?>
                    <marquee scrollamount="2" align="center" style="text-align:center; height:75px; color:#38503e;" direction="left">
                        <?php
                        while ($fetch = fetcharray($res)) {
                        ?>
                        <div class="alert alert-dark" role="alert">
                        <?= strip_tags(stripslashes($fetch['announcement'])) ?>                                    </div>
                        <?php } ?>
                    </marquee>
                <?php } ?>

                <?php if (isset($_REQUEST['m']) == 1) { ?><p align="center" style="color:#00CC00;text-transform: capitalize; padding-bottom:8px; font-size:16px;"><strong>Your account is successfully activated!</strong></p><?php } ?>

                <?php


                $paystatus = getMember($conn, $_SESSION['mid'], 'paystatus');


                if ($paystatus == 'A') {
                    $packid = getEpinpakageBYuserid($conn, $userid);

                    $getpackname = getSettingsJoining($conn, $packid, 'pack_name');
                    $getpackamt = getSettingsJoining($conn, $packid, 'joining');


                ?>

                    <b> Package Name: </b> <span style="color:#ffffff"><?= $getpackname ?> </span>
                    &nbsp&nbsp&nbsp&nbsp
                    <b> Package Amount: </b> <span style="color:#ffffff"><?= $getpackamt ?> </span>
                    &nbsp&nbsp&nbsp&nbsp
                    <b>Join Date : <span class="badge badge-success"><?=getMember($conn,$_SESSION['mid'],'date')?></span></b>

                <?php
                }
                if ($paystatus == 'I') {
                ?>
                    <h3 align="center" style="color:#FF0000; font-size:22px;font-weight: 800;text-transform: capitalize;"><br /><a href="activation.php">Click here</a> to activate your account!</h3>
                <?php } ?>

                        </div>

                    </div>
                </div>
              
               

               
                <div class="col-xxl-3 col-xl-12">

                    <div class="row">

                        <div class="col-xxl-12 col-xl-4 col-md-4 col-sm-6">
                            <div class="stat-widget d-flex align-items-center">
                                <div class="widget-icon me-3 bg-primary"><span><i class="ri-wallet-line"></i></span>
                                </div>
                                <div class="widget-content">
                                    <h3><?= getBinaryBonus($conn, $userid) ?> $</h3>
                                    <p>Binary Bonus</p>
                                </div>
                                <div class="widget-arrow">
                                    <p class="text-success mb-0"><span><i class="bi bi-arrow-up"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-4 col-md-4 col-sm-6">
                            <div class="stat-widget d-flex align-items-center">
                                <div class="widget-icon me-3 bg-secondary"><span><i class="ri-wallet-2-line"></i></span>
                                </div>
                                <div class="widget-content">
                                    <h3><?= getDirectBonus($conn, $userid) ?> $</h3>
                                    <p>Referral Bonus</p>
                                </div>
                                <div class="widget-arrow">
                                    <p class="text-danger mb-0"> <span><i class="bi bi-arrow-up"></i></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-8 col-lg-6">
                   <div class="stat-widget d-flex align-items-center">
                                <div class="widget-icon me-3 bg-success"><span><i class="ri-wallet-3-line"></i></span>
                                </div>
                                <div class="widget-content">
                                    <p>User ID</p>

                                    <h3><?= getUserID($conn, $_SESSION['mid'], 'userid') ?></h3>
                                </div>
                                
                            </div>

                             <div class="stat-widget d-flex align-items-center">
                                <div class="widget-icon me-3 bg-success"><span><i class="ri-wallet-3-line"></i></span>
                                </div>
                                   <?php if (getMember($conn, $_SESSION['mid'], 'sponsor')) { ?>
                                <div class="widget-content">
                                    <h3><?= getMember($conn, $_SESSION['mid'], 'sponsor') ?></h3>
                                    <p>Referance ID</p>
                                </div> 
                                <div class="widget-arrow">
                                    <p class="text-danger mb-0">  <?php if ($paystatus == 'A') { ?>

                                    <span class="badge badge-success">Active</span>

                                                <?php
                                   } else { ?><span class="badge badge-danger">Inactive</span><?php } ?>
                                    </p>
                                </div><?php } ?>
                            </div>
                </div>


                <div class=" col-xxl-3 col-xl-4 col-lg-6">
                     <div class="stat-widget d-flex align-items-center">
                                <div class="widget-icon me-3 bg-success"><span><i class="ri-wallet-3-line"></i></span>
                                </div>
                                <div class="widget-content">
                                    <h3><?= getTotalIncomeMember($conn, $userid) ?> $</h3>
                                    <p>Total Income</p>
                                </div>
                                <div class="widget-arrow">
                                    <p class="text-success mb-0"><span><i class="bi bi-arrow-up"></i></span>
                                    </p>
                                </div>
                            </div>
                </div>

                

                

                <div class="col-xl-12">
                    <h4 class="card-title mb-3">Recent Referral Members </h4>
                    <div class="bid-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                       
                                        <th>#NO</th>

                                        <th>User ID</th>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Pay Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tname = 'or_member';
                                    $lim = 100;
                                    $tpage = 'member-direct-downline.php';
                                    $where = "WHERE `sponsor`='" . getMember($conn, $_SESSION['mid'], 'userid') . "' ORDER BY `id` DESC";
                                    include('pagination.php');
                                    $num = numrows($result);
                                    $i = 1;
                                    if ($num > 0) {  
                                        while ($fetch = fetcharray($result)) {
                                    ?>
                                            <td align="center"><?= $i ?></td>
                                            <td align="center"><?= $fetch['userid'] ?></td>
                                            <td align="center"><?= $fetch['name'] ?></td>
                                            <td align="center"><?= $fetch['phone'] ?></td>
                                            <td align="center"><?php if ($fetch['status'] == 'A') { ?><span style="display: inline-block; padding: 0.35em 0.65em; font-size: 0.75em; font-weight: 700; line-height: 1; color: #22a50f; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 8px;">Active</span><?php } else { ?> <span style="display: inline-block; padding: 0.35em 0.65em; font-size: 0.75em; font-weight: 700; line-height: 1; color: #a80d0d; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 8px; ">Inactive</span><?php } ?>
                                        </td>
                                            <td align="center"><?php if ($fetch['paystatus'] == 'I') { ?><span style=" display: inline-block; padding: 0.35em 0.65em; font-size: 0.75em; font-weight: 700; line-height: 1; color: #a80d0d; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 8px;">Pending</span><?php } else { ?><span style="display: inline-block; padding: 0.35em 0.65em; font-size: 0.75em; font-weight: 700; line-height: 1; color: #22a50f; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 8px;">Paid</span><?php } ?></td>
                                            <td align="center"><?= $fetch['date'] ?></td>
                                            </tr>

                                        <?php $i++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td>
                                        </tr>
                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                         <div align="center"><?= $pagination ?></div>
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