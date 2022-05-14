

<?php
include('administrator/includes/function.php');


?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item Details</title>
  

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper" class="front">

     <?php include'includes/menu.php'; ?>

    <div class="page-title">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <div class="page-title-content">
                    <h3>Explore</h3>
                    <p class="mb-2">Neftify Explore page</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a
                        href="#">Payments</a></div>
            </div>
        </div>
    </div>
</div>


    <div class="item-single section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="top-bid">
                        <div class="card-body">
                            <?php
                    $sql = "SELECT * FROM `or_settings_joining`  ORDER BY `id`";
                    $res = query($conn, $sql);

                    while ($fetch = fetcharray($res)) {
                        ?>
                            <div class="row">
                                <div class="col-md-6"><img src="images/items/11.jpg" class="img-fluid rounded"
                                        alt="..."></div>
                                <div class="col-md-6">
                                    <h3 class="mb-3"><?php echo $fetch['pack_name']   ?></h3>
                                    <div class="d-flex align-items-center mb-3"><img src="images/avatar/1.jpg" alt=""
                                            class="me-3 avatar-img">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-0">John Abraham<span class="circle bg-success"></span></h5>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4 mb-4">
                                        <div class="text-start">
                                            <h4 class="mb-2">Auction Time</h4>
                                            <h5 class="text-muted">3h : 1m : 50s</h5>
                                        </div>
                                        <div class="text-end">
                                            <h4 class="mb-2">Current Bid : <strong class="text-primary">0.05
                                                    ETH</strong></h4>
                                            <h5 class="text-muted">0.15 ETH</h5>
                                        </div>
                                    </div>
                                    <p class="mb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos, unde.
                                        Unde, doloremque ipsam? Nesciunt dolorem nisi quae nostrum veniam quasi illum,
                                        iusto tempore nihil, natus perspiciatis? Sed</p>
                                    <h4 class="card-title mb-3">Latest Bids</h4>
                                    <div class="bid mb-3 card">
                                        <div class="activity-content card-body py-0">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="activity-user-img me-3"><img
                                                                src="images/avatar/1.jpg" alt="" width="50"></div>
                                                        <div class="activity-info">
                                                            <h5 class="mb-0">Papaya</h5>
                                                            <p>0.05 ETH</p>
                                                        </div>
                                                    </div>
                                                    <div class="text-end"><span class=" text-muted">12 min ago</span>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="activity-user-img me-3"><img
                                                                src="images/avatar/2.jpg" alt="" width="50"></div>
                                                        <div class="activity-info">
                                                            <h5 class="mb-0">Alex Maris</h5>
                                                            <p>0.06 ETH</p>
                                                        </div>
                                                    </div>
                                                    <div class="text-end"><span class=" text-muted">12 min ago</span>
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="activity-user-img me-3"><img
                                                                src="images/avatar/3.jpg" alt="" width="50"></div>
                                                        <div class="activity-info">
                                                            <h5 class="mb-0">John Adams</h5>
                                                            <p>0.06 ETH</p>
                                                        </div>
                                                    </div>
                                                    <div class="text-end"><span class=" text-muted">12 min ago</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex"><a href="registration.php" class="btn btn-primary">Buy Now</a></div>
                                </div>
                            </div>
                              <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bottom section-padding triangle-top-dark triangle-bottom-dark">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-7 col-sm-8">
                <div class="bottom-logo"><img class="pb-3" src="images/logoh.png" alt="">
                    <p>Neftify is a unique and beautiful collection of UI elements that are all flexible and modular. A
                        complete and customizable solution to building the website of your dreams.</p>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-5 col-sm-4 col-6">
                <div class="bottom-widget">
                    <h4 class="widget-title">About us</h4>
                    <ul>
                        <li><a href="explore.html">Explore</a></li>
                        <li><a href="item.html">Item</a></li>
                        <li><a href="collection.html">Collection</a></li>
                        <li><a href="connect.html">Connect</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6">
                <div class="bottom-widget">
                    <h4 class="widget-title">Settings</h4>
                    <ul>
                        <li><a href="settings.html">Settings</a></li>
                        <li><a href="application.html">Application</a></li>
                        <li><a href="security.html">Security</a></li>
                        <li><a href="activity.html">Activity</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-8 col-sm-8">
                <div class="bottom-widget">
                    <h4 class="widget-title">Profile</h4>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <ul>
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="created.html">Created</a></li>
                                <li><a href="collected.html">Collected</a></li>
                                <li><a href="activity.html">Activity</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <ul>
                                <li><a href="onsale.html">On Sale</a></li>
                                <li><a href="liked.html">Liked</a></li>
                                <li><a href="following.html">Following</a></li>
                                <li><a href="followers.html">Followers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="copyright">
                    <p>© Copyright 2022 <a href="#">Neftify</a> <!-- -->All Rights Reserved</p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="footer-social">
                    <ul>
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="js/scripts.js"></script>


</body>


</html>