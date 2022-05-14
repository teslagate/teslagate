<?php
session_start();
include('../administrator/includes/function.php');
include 'header/header.php';

if (!isset($_SESSION['mid'])) {
    redirect('../index.php');
}
$userid = getMember($conn, $_SESSION['mid'], 'userid');
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Binary Commission | <?= $title ?></title>
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
                  <div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Binary Bonus Statement</h2>
            </div>
            <!-- /Title -->
        </div>
        <section class="hk-sec-wrapper">
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr align="center">
                                            <th style="text-align:center;">No</th>
                                            <th style="text-align:center;">Bonus</th>
                                            <th style="text-align:center;">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "SELECT DISTINCT(`date`) FROM `or_commission_binary` WHERE `userid`='" . $userid . "' ORDER BY `id` DESC";
                                        $res = query($conn, $sql);
                                        $num = numrows($res);
                                        if ($num > 0) {
                                            $i = 1;
                                            while ($fetch = fetcharray($res)) {
                                        ?>
                                                <tr>
                                                    <td align="center" style="padding:3px;"><?= $i ?></td>
                                                    <td align="center" style="padding:3px;"><?= getBinaryBonusDate($conn, $userid, $fetch['date']) ?></td>
                                                    <td align="center" style="padding:3px;"><?= $fetch['date'] ?></td>
                                                </tr>
                                            <?php $i++;
                                            }
                                        } else { ?>
                                            <tr>
                                                <td colspan="3" align="center" style="color:#FF0000;">No Record Found!</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                        <div align="center"><?= $pagination ?></div>
                    </div>
                </div>
            </div>
        </section>

               

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