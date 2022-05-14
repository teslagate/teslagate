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
    <title>Investing Market</title>
    <meta name="description" content="Investing Market">


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
                    <h3>NFT Marketing Advance B2I Platform</h3>
                    <p class="mb-2">Investing Market </p>
                </div>
            </div>
            <div class="col-auto">
                <div class="breadcrumbs"><a href="index.php">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a
                        href="explore.php">Explore</a></div>
            </div>
        </div>
    </div>
</div>


    <div class="explore section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-3">
                    <div class="filter-sidebar">
                        <div class="filter-sidebar-content">
                            <h5>Status</h5>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault1" value=""><label class="form-check-label"
                                    for="flexCheckDefault1">Buy Now</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault2" value=""><label class="form-check-label"
                                    for="flexCheckDefault2">On Auction</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault3" value=""><label class="form-check-label"
                                    for="flexCheckDefault3">New</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault4" value=""><label class="form-check-label"
                                    for="flexCheckDefault4">Has Offers</label></div>
                        </div>
                        <div class="filter-sidebar-content">
                            <h5>Explore</h5>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault5" value=""><label class="form-check-label"
                                    for="flexCheckDefault5">Gambling Apes</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault6" value=""><label class="form-check-label"
                                    for="flexCheckDefault6">The Sandbox</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault7" value=""><label class="form-check-label"
                                    for="flexCheckDefault7">The Sandbox</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault8" value=""><label class="form-check-label"
                                    for="flexCheckDefault8">CryptoPunks</label></div>
                        </div>
                        <div class="filter-sidebar-content">
                            <h5>Chains</h5>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault9" value=""><label class="form-check-label"
                                    for="flexCheckDefault9">Ethereum</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault10" value=""><label class="form-check-label"
                                    for="flexCheckDefault10">Polygon</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault11" value=""><label class="form-check-label"
                                    for="flexCheckDefault11">Klaytn</label></div>
                        </div>
                        <div class="filter-sidebar-content">
                            <h5>Categories</h5>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault12" value=""><label class="form-check-label"
                                    for="flexCheckDefault12">Art</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault13" value=""><label class="form-check-label"
                                    for="flexCheckDefault13">Music</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault14" value=""><label class="form-check-label"
                                    for="flexCheckDefault14">Domain Names</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault15" value=""><label class="form-check-label"
                                    for="flexCheckDefault15">Virtual Worlds</label></div>
                        </div>
                        <div class="filter-sidebar-content">
                            <h5>On Sale In</h5>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault16" value=""><label class="form-check-label"
                                    for="flexCheckDefault16">ETH</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault17" value=""><label class="form-check-label"
                                    for="flexCheckDefault17">BTC</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault18" value=""><label class="form-check-label"
                                    for="flexCheckDefault18">DG</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault19" value=""><label class="form-check-label"
                                    for="flexCheckDefault19">ALXO</label></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-9">
                    <div class="row">
                          <?php
                    $sql = "SELECT * FROM `or_settings_joining`  ORDER BY `id`";
                    $res = query($conn, $sql);

                    while ($fetch = fetcharray($res)) {
                        ?>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                            <div class="card items">
                                <div class="card-body">
                                    <div class="items-img position-relative">
                                        <img src="images/items/1.jpg" class="img-fluid rounded mb-3" alt="">
                                        <a href="profile.html"><img src="images/avatar/1.jpg" class="creator"
                                                width="50" alt=""></a>
                                    </div>
                                    <a href="item.html">
                                        <h4 class="card-title"><?php echo $fetch['pack_name']   ?></h4>
                                    </a>
                                    <p></p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-start">
                                            <p class="mb-2">Referral Commission : <?php echo $fetch['direct']   ?>%</p>
                                            <p class="mb-2">Binary Commission : <?php echo $fetch['binary']   ?> %</p>
                                        </div>
                                        <div class="text-end">
                                            <p class="mb-2">Price : <strong class="text-primary"><?php echo $fetch['joining']   ?> ETH</strong></p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3"><a class="btn btn-primary"
                                            href="registration.php">Pay Now</a></div>
                                </div>
                            </div>
                        </div>
                         <?php  } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


       <?php include'includes/footer.php'; ?>
