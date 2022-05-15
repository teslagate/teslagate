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
    <title>MetaInv | Investment and earnings system with NFT!</title>
    <meta name="description" content="Investment and earnings system with NFT">
        <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<!-- main end  -->

<?php include'includes/menu.php'; ?>
<!-- main end  -->

    <div class="intro1 section-padding">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="intro-content  my-5">
                        <h1 class="mb-3"> Make extraordinary investments <span>with NFT</span> secure your future! </h1>
                        <p>The world's first and largest investment platform.</p>
                        <div class="intro-btn mt-5">
                            <a class="btn btn-primary" href="explore.php">Explore<i class="bi bi-arrow-right"></i>
                            </a>
                            <a class="btn btn-outline-primary" href="registration.php">Become an Investor</a>
                        </div>
                      
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="intro-slider">
                        <div class="slider-item"><img src="images/items/9.jpg" alt="" class="img-fluid">
                            <div class="slider-item-avatar"><a href="explore.php"><img src="images/avatar/1.jpg"
                                        alt=""></a>
                                <div>
                                    <h5>TeslaGateway B</h5>
                                    <p>Manufacturer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- top companies start  -->

    <div class="top-collection section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section-title text-center">
                        <h2>Top company over last 7 days</h2>
                        <p><span>MetaInv</span>Makes Everyone Think and Win.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                    <?php
                    $sql = "SELECT * FROM `or_company`  ORDER BY `id`";
                    $res = query($conn, $sql);

                    while ($fetch = fetcharray($res)) {
                        ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <a class="top-collection-content d-block" href="#">
                        <div class="d-flex align-items-center"><span class="serial">1
                                <!-- -->.
                            </span>
                            <div class="flex-shrink-0"><span class="top-img"><img class="img-fluid"
                                        src="images/items/1.jpg" alt="" width="70"></span></div>
                            <div class="flex-grow-1 ms-3">
                                <h5><?php echo $fetch['company_name']   ?></h5>
                                <p class="text-muted">Fondation: <?php echo $fetch['f_year'] ?></p>
                            </div>
                           
                        </div>
                    </a>
                </div>
               <?php  } ?>
               
            
            </div>
        </div>
    </div>

        <!-- top companies end  -->

                <!-- Trending Items Start  -->


    <div class="trending-category section-padding bg-light triangle-top-light triangle-bottom-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-center d-flex justify-content-between mb-3">
                        <h2>Trending Items</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <?php
                    $sql = "SELECT * FROM `or_settings_joining`  ORDER BY `id`";
                    $res = query($conn, $sql);

                    while ($fetch = fetcharray($res)) {
                        ?>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card items">
                        <div class="card-body">
                            <div class="items-img position-relative">
                                <img src="images/items/5.jpg" class="img-fluid rounded mb-3" alt="">
                                <a href="#"><img src="images/avatar/1.jpg" class="creator" width="50"
                                        alt=""></a>
                            </div>
                            <a href="item.php">
                                <h4 class="card-title"><?php echo $fetch['pack_name']   ?></h4>
                            </a>
                            <p></p>
                            <div class="d-flex justify-content-between">
                                <div class="text-start">
                                    <p class="mb-2">Referral Commission : <?php echo $fetch['direct']   ?>%</p>
                                    <p class="mb-2">Binary Commission : <?php echo $fetch['binary']   ?> %</p>
                                </div>
                                <div class="text-end">
                                    <p class="mb-2">Price :<strong class="text-primary"><?php echo $fetch['joining']   ?> ETH</strong></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3"><a class="btn btn-primary"
                                    href="item.php?id=<?php echo $fetch['id'] ?>">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                <?php  } ?>
               
              
            </div>
        </div>
    </div>

                <!-- Trending Items end  -->

<!-- Earn Income İnform. Start  -->
    <div class="create-sell section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section-title text-center">
                        <h2>Invest with NFT and earn income!</h2>
                        <p>How Does MetaInv Work?</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="create-sell-content">
                        <div class="create-sell-content-icon"><i class="bi bi-shield-check"></i></div>
                        <div>
                            <h4>Set up your wallet </h4>
                            <p>Once you’ve set up your wallet of choice, connect it to Neftify by clicking the wallet
                                icon in the top right corner. Learn about the wallets we support.</p><a
                                href="explore.php">Explore<i class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="create-sell-content">
                        <div class="create-sell-content-icon"><i class="bi bi-x-diamond"></i></div>
                        <div>
                            <h4>Create your collection</h4>
                            <p>Click My Collections and set up your collection. Add social links, a description, profile
                                &amp; banner images, and set a secondary sales fee.</p><a href="explore.php">Explore<i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="create-sell-content">
                        <div class="create-sell-content-icon"><i class="bi bi-circle-half"></i></div>
                        <div>
                            <h4>Add your NFTs</h4>
                            <p>Upload your work (image, video, audio, or 3D art), add a title and description, and
                                customize your NFTs with properties, stats, and unlockable content.</p><a
                                href="explore.php">Explore<i class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="create-sell-content">
                        <div class="create-sell-content-icon"><i class="bi bi-circle-half"></i></div>
                        <div>
                            <h4>List them for sale</h4>
                            <p>Choose between auctions, fixed-price listings, and declining-price listings. You choose
                                how you want to sell your NFTs, and we help you sell them!</p><a
                                href="explore.php">Explore<i class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earn Income İnform. Start  -->

   

   <?php include'includes/footer.php'; ?>
