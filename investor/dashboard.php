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

    <div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="header-content">
                    <div class="header-left">
                        <div class="brand-logo"><a class="mini-logo" href="index.html"><img src="images/logoi.png" alt=""
                                    width="40"></a></div>
                        <div class="search">
                            <form action="#"><span><i class="ri-search-line"></i></span><input type="text"
                                    placeholder="Search Here"></form>
                        </div>
                    </div>
                    <div class="header-right">
                        <!-- <div class="theme-switch"><i class="ri-sun-line"></i></div> -->

                     


                    
                        <div class="dropdown profile_log dropdown">
                            <div data-bs-toggle="dropdown">
                                <div class="user icon-menu active"><span><img src="images/avatar/9.jpg" alt=""></span>
                                </div>
                            </div>
                            <div tabindex="-1" class="dropdown-menu dropdown-menu-end">
                                <div class="user-email">
                                    <div class="user">
                                        <span class="thumb">
                                            <img src="images/profile/3.png" alt="">
                                        </span>
                                        <div class="user-info">
                                            <h5><?=getMember($conn,$_SESSION['mid'],'name')?></h5>
                                            <span><?=getMember($conn,$_SESSION['mid'],'email')?></span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="profile.html">
                                    <span><i class="ri-user-line"></i></span>Profile
                                </a>
                               
                                <a class="dropdown-item logout" href="logout.php">
                                    <i class="ri-logout-circle-line"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
   <?php include'includes/left-side.php'; ?>

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

                    <b> Package Name: </b> <span style="color:red"><?= $getpackname ?> </span>
                    &nbsp&nbsp&nbsp&nbsp
                    <b> Package Amount: </b> <span style="color:red"><?= $getpackamt ?> </span>
                    &nbsp&nbsp&nbsp&nbsp
                    <b>Join Date : <span class="badge badge-success"><?=getMember($conn,$_SESSION['mid'],'date')?></span></b>

                <?php
                }
                if ($paystatus == 'I') {
                ?>
                    <h3 align="center" style="color:#FF0000; font-size:22px;font-weight: 800;text-transform: capitalize;"><br /><a href="activation.php">Click here</a> to activate your account!</h3>
                <?php } ?>


           
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="promotion d-flex justify-content-between align-items-center">
                        <div class="promotion-detail">
                            <h3 class="text-white mb-3">Choose your investment NFT and win</h3>
                            <p>Try the new generation earning system with B2I now!</p><a href="plan.php" 
                                class="btn btn-primary me-3">Invest Plan</a>
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
                                        <th>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    value=""></div>
                                        </th>
                                        <th>Item List</th>
                                        <th>Open Price</th>
                                        <th>Your Offer</th>
                                        <th>Recent Offer</th>
                                        <th>Time Left</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/15.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/1.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/16.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/2.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/17.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/3.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/18.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/4.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                </tbody>
                            </table>
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