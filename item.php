

<?php
include('administrator/includes/function.php');
include('includes/api.php');


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
                    <p class="mb-2">MetaInv Explore page</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="breadcrumbs"><a href="index.php">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a
                        href="registration.php">Purchase</a></div>
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
                                            <h5 class="mb-0">Construction Company<span class="circle bg-success"></span></h5>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4 mb-4">
                                        <div class="text-start">
                                            <h4 class="mb-2">Auction Time</h4>
                                            <h5 class="text-muted">3h : 1m : 50s</h5>
                                        </div>
                                        <div class="text-end">
                                            <h4 class="mb-2">Current Bid : <strong class="text-primary"><?php echo $fetch['joining']   ?> ETH</strong></h4>
                                            <h5 class="text-muted">Network Fee : 0.15 ETH</h5>
                                        </div>
                                    </div>
                                    <p class="mb-3"><?php echo $fetch['description']   ?></p>
                                    
                                    <div class="bid mb-3 card">
                                      
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
