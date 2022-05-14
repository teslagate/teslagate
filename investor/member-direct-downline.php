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