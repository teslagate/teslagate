<?php
session_start();
include('../administrator/includes/function.php');



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


           
    <div class="content-body">
        <div class="container">
            <div class="row">
               
              

                

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