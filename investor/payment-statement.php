<?php
session_start();
include('../administrator/includes/function.php');
include 'header/header.php';

if (!isset($_SESSION['mid'])) {
    redirect('../index.php');
}
$left = 3;
?>


<title>Payment Statement | <?= $title ?></title>

<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Payment View Statement</h2>
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
                                                <th align="center">No </th>
                                                <th align="center">Transaction_ID</th>
                                                <th align="center">Package</th>

                                                <th align="center">Amount</th>
                                                <th align="center">Slip</th>
                                                <th align="center">Status</th>
                                                <th align="center">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tname = 'or_member_payment';
                                            $lim = 100;
                                            $tpage = 'payment-statement.php';
                                            $where = "WHERE `userid`='" . getMember($conn, $_SESSION['mid'], 'userid') . "' ORDER BY `id` DESC";

                                            include('pagination.php');
                                            $num = numrows($result);
                                            $i = 1;
                                            if ($num > 0) {
                                                while ($fetch = fetcharray($result)) {
                                            ?>
                                                    <tr>
                                                        <td align="center"><?= $i ?></th>
                                                        <td align="center"><?= $fetch['tranid'] ?></td>
                                                        <td align="center"><?= getSettingsJoining($conn, $fetch['packid'], 'pack_name') ?></td>

                                                        <td align="center"><?= $fetch['amount'] ?></td>
                                                        <td align="center"><a href="file-download-payment.php?f=<?= $fetch['slip'] ?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></td>
                                                        <td align="center"><?php if ($fetch['status'] == 'P') { ?><a style="color:#FF0000;">Pending</a><?php } else { ?><a style="color:#009900;">Approved</a><?php } ?></td>
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

                        </div>
                        <div align="center"><?= $pagination ?></div>
                    </div>
                </div>
            </div>
        </section>



        