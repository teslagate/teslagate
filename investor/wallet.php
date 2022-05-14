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
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-6">
                        <div class="page-title-content">
                            <h3>Wallet</h3>
                            <p class="mb-2">Welcome MetaInv Wallet</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="#">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Wallet</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <h4 class="card-title mb-3">Balance Details</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="total-balance">
                                        <p>Total Balance</p>
                                        <h2>$221,478</h2>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="balance-stats active">
                                        <p>Last Month</p>
                                        <h3>$42,678</h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="balance-stats">
                                        <p>Expenses</p>
                                        <h3>$1,798</h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="balance-stats">
                                        <p>Taxes</p>
                                        <h3>$255.25</h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="balance-stats">
                                        <p>Debt</p>
                                        <h3>$365,478</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="card-header px-0 pt-0">
                        <h4 class="card-title">Latest Transaction</h4><a href="#">See More</a>
                    </div>
                    <div class=" top-creators-content">
                        <div class="d-flex justify-content-between creator-widget active  align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="top-creators-user-img me-3"><img src="images/items/item_1.html" alt=""
                                        width="60"></div>
                                <div class="top-creators-info">
                                    <h5 class="mb-0">Terry Camacho</h5>
                                    <p class="mb-2">60 Items</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <h5 class="text-primary">0.2658 ETH</h5>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between creator-widget active  align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="top-creators-user-img me-3"><img src="images/items/item_1.html" alt=""
                                        width="60"></div>
                                <div class="top-creators-info">
                                    <h5 class="mb-0">Terry Camacho</h5>
                                    <p class="mb-2">60 Items</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <h5 class="text-primary">0.2658 ETH</h5>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between creator-widget active  align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="top-creators-user-img me-3"><img src="images/items/item_1.html" alt=""
                                        width="60"></div>
                                <div class="top-creators-info">
                                    <h5 class="mb-0">Terry Camacho</h5>
                                    <p class="mb-2">60 Items</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <h5 class="text-primary">0.2658 ETH</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-8 col-xl-8 col-lg-6">
                    <h4 class="card-title mb-3">Investment</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div><canvas height="300" width="920" id="activity"
                                style="display: block; width: 920px; height: 300px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
                <div class=" col-xxl-4 col-xl-4 col-lg-6">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                            <div class="credit-card visa">
                                <div class="type-brand">
                                    <h4>Debit Card</h4><img src="images/cc/visa.png" alt="">
                                </div>
                                <div class="cc-number">
                                    <h6>1234</h6>
                                    <h6>5678</h6>
                                    <h6>7890</h6>
                                    <h6>9875</h6>
                                </div>
                                <div class="cc-holder-exp">
                                    <h5>TeslaGateway</h5>
                                    <div class="exp"><span>EXP:</span><strong>12/21</strong></div>
                                </div>
                                <div class="cc-info">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-5">
                                            <div class="d-flex">
                                                <p class="me-3">Status</p>
                                                <p><strong>Active</strong></p>
                                            </div>
                                            <div class="d-flex">
                                                <p class="me-3">Currency</p>
                                                <p><strong>USD</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="d-flex justify-content-between">
                                                <div class="ms-3">
                                                    <p>Credit Limit</p>
                                                    <p><strong>2000 USD</strong></p>
                                                </div>
                                                <div id="circle1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                            <div class="credit-card payoneer">
                                <div class="type-brand">
                                    <h4>Debit Card</h4><img src="images/cc/payoneer.png" alt="">
                                </div>
                                <div class="cc-number">
                                    <h6>1234</h6>
                                    <h6>5678</h6>
                                    <h6>7890</h6>
                                    <h6>9875</h6>
                                </div>
                                <div class="cc-holder-exp">
                                    <h5>TeslaGateway</h5>
                                    <div class="exp"><span>EXP:</span><strong>12/21</strong></div>
                                </div>
                                <div class="cc-info">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex">
                                                <p class="me-3">Status</p>
                                                <p><strong>Active</strong></p>
                                            </div>
                                            <div class="d-flex">
                                                <p class="me-3">Currency</p>
                                                <p><strong>USD</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="d-flex justify-content-between">
                                                <div class="ms-3">
                                                    <p>Credit Limit</p>
                                                    <p><strong>1500/2000 USD</strong></p>
                                                </div>
                                                <div id="circle3"></div>
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