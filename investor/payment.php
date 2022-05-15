<?php
session_start();
include('../administrator/includes/function.php');
include 'header/header.php';

if (!isset($_SESSION['mid'])) {
    redirect('../index.php');
}
$userid = getMember($conn, $_SESSION['mid'], 'userid');
$left = 2;
?>


<title>Payment Request | <?= $title ?></title>
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

        <div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Payment Request</h2>
            </div>
           
            <!-- /Title -->
        </div>
        <div class="col-md-8">
           
           </div>
                           <div class="auth-form">
                    <div class="row">
                        <div class="col-xl-6"><a class="card text-center" href="dashboard.html">
                                <div class="card-body"><img src="images/wallet/1.webp" alt="" width="50" class="mb-3">
                                    <h5 class="mb-0">MetaMask</h5>
                                </div>
                            </a></div>
                        <div class="col-xl-6"><a class="card text-center" href="dashboard.html">
                                <div class="card-body"><img src="images/wallet/2.webp" alt="" width="50" class="mb-3">
                                    <h5 class="mb-0">Coinbase</h5>
                                </div>
                            </a></div>
                        <div class="col-xl-6"><a class="card text-center" href="dashboard.html">
                                <div class="card-body"><img src="images/wallet/3.webp" alt="" width="50" class="mb-3">
                                    <h5 class="mb-0">WalletConnect</h5>
                                </div>
                            </a></div>
                        <div class="col-xl-6"><a class="card text-center" href="dashboard.html">
                                <div class="card-body"><img src="images/wallet/4.webp" alt="" width="50" class="mb-3">
                                    <h5 class="mb-0">Formatic</h5>
                                </div>
                            </a></div>
                    </div>
                </div>                       

                        <div class="card" style="background:#FFFFFF;">
                            <div class="card-header">
                                <div class="card-title">Payment Request</div>
                            </div>
                            
                            
                            
                            <div class="card-body">

                                <?php if ($_REQUEST['s'] == 1) { ?>
                                    <div align="center" style="margin:0;padding:0;color:#00CC00; font-size:16px;"><strong>Your payment request has been sent for approval!</strong></div>
                                <?php } ?>

                                <form class="form" action="payment-process.php" method="post" enctype="multipart/form-data">



                                    <div class="col-md-8">
                                        <div class="form-group form-group-default">
                                            <label>Package<span style="color:#CC0000;">*</span></label>
                                            <select id="packid" name="packid" class="form-control">
                                                <?php
                                                $sql = "SELECT * FROM `or_settings_joining`  ORDER BY `id`";
                                                $res = query($conn, $sql);

                                                while ($fetch = fetcharray($res)) {

                                                ?>

                                                    <option value="<?php echo $fetch['id']   ?>"><?php echo $fetch['pack_name']   ?></option>

                                                <?php  } ?>

                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-8">
                                        <div class="form-group form-group-default">
                                            <label>USD-T Wallet<span style="color:#CC0000;">*</span></label>
                                            <input type="text" class="form-control" name="tranid" placeholder="USD-T Wallet" value="" required>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group form-group-default">
                                            <label>Amount<span style="color:#CC0000;">*</span></label>
                                            <input type="text" class="form-control" name="amount" placeholder="Amount" value="" required>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group form-group-default">
                                            <label>Receipt<span style="color:#CC0000;">*</span></label>
                                            <input type="file" placeholder="" id="file" name="file" value="" accept=".png,.jpeg,.jpg,.pdf,.docx,.pjp,.xlsx" required />
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-success">Send Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

  <script>


            function copyToClipboard(element) {


                var copyText = document.getElementById('p1')
                copyText.select();
                document.execCommand('copy')

                document.getElementById('cpbutton').innerHTML = 'COPIED';





            }
        </script>
       


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