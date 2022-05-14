<?php
session_start();
include('../administrator/includes/function.php');
include('header/header.php');

if (!isset($_SESSION['mid'])) {
    redirect('../index.php');
}
?>




<title>Account Verification | <?= $title ?></title>

<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
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



        <!-- /Container -->

        <?php
        include 'footer/footer.php';
        ?>