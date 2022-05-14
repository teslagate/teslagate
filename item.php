

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


       <?php include'includes/footer.php'; ?>
