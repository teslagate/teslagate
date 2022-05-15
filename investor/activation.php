<?php
session_start();
include('../administrator/includes/function.php');
include('header/header.php');

if (!isset($_SESSION['mid'])) {
    redirect('../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    Account Verification | <?= $title ?>
    <meta name="description"        content="Dashboard">


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
               
              
               
 <div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Account Verification <i data-feather="check-circle"></i> </h2>
            </div>
            <!-- /Title -->
        </div>
              <div class="col-md-8">
       
                           
                            <div>&nbsp;</div>
                            <?php if ($_REQUEST['e'] == 1) { ?><div align="center" style="color:#FF0000;">Invalid/Used Epin</div><?php } ?>

                            <h3 align="center">Please Enter Pin! </h3>

                            <form class="form" action="activation-process.php" method="post">
                                <div class="form-group">
                                    <label for="pillInput"><strong style="color:#000000;">Epin</strong></label>
                                    <input type="text" class="form-control input-pill" id="epin" name="epin" placeholder="Enter Epin" required>
                                </div>

                                <div class="card-action">
                                    <button class="btn btn-success">Activate Now</button>
                                </div>
                            </form>

               

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