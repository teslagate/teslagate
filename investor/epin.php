<?php
session_start();
include('../administrator/includes/function.php');
include('header/header.php');
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
<title>E-pin Statement | <?= $title ?></title>
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
                <h2 class="hk-pg-title font-weight-600 mb-10">E-pin Statement</h2>
            </div>
            <!-- /Title -->
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Payment Request</div>
                </div>
                <div class="card-body" style="overflow-x:auto;">


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Epin</th>
                                <th>Status</th>
                                <th>Used_By</th>
                                <th>Name</th>
                                <th>Used_On</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tname = 'or_epin';
                            $lim = 100;
                            $tpage = 'epin.php';
                            $where = "WHERE `toid`='" . getMember($conn, $_SESSION['mid'], 'userid') . "' ORDER BY `id` DESC";
                            include('pagination.php');
                            $num = numrows($result);
                            $i = 1;
                            if ($num > 0) {
                                while ($fetch = fetcharray($result)) {
                            ?>
                                    <script>
                                        function copyToClipboard<?= $i ?>(element) {
                                            var $temp = $("<input>");
                                            $("body").append($temp);
                                            $temp.val($(element).text()).select();
                                            document.execCommand("copy");
                                            $temp.remove();
                                            document.getElementById('cpbutton<?= $i ?>').innerHTML = 'COPIED';
                                        }
                                    </script>
                                    <tr>
                                        <td align="center"><?= $i ?></td>
                                        <td align="center"><span id="p1<?= $i ?>"><?= $fetch['epin'] ?></span>&nbsp;&nbsp;<i class="fa fa-copy" onClick="copyToClipboard<?= $i ?>('#p1<?= $i ?>')" id="cpbutton<?= $i ?>" style="cursor:pointer;"></i></td>
                                        <td align="center"><?php if ($fetch['status'] == 'A') { ?><span style="color:#00CC00;background:#FFFFFF;padding:3px 10px;font-weight:bold;">Available</span><?php } else { ?><span style="color:#FF0000;background:#FFFFFF;padding:3px 10px;font-weight:bold;">Used</span><?php } ?></td>
                                        <td align="center"><?php if ($fetch['usedby']) { ?><?= $fetch['usedby'] ?><?php } else { ?>---<?php } ?></td>
                                        <td align="center"><?php if ($fetch['usedby']) { ?><?= getMemberUserid($conn, $fetch['usedby'], 'name') ?><?php } else { ?>---<?php } ?></td>
                                        <td align="center"><?php if ($fetch['usedon']) { ?><?= $fetch['usedon'] ?><?php } else { ?>---<?php } ?></td>
                                        <td align="center"><?= $fetch['date'] ?></td>
                                    </tr>
                                <?php $i++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div align="center"><?= $pagination ?></div>

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