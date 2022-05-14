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
    <title>Dashboard | <?= $title ?></title>
    <meta name="description"
        content="Dashboard">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">


    <style>
        .button {
            background: #FF6600;
            color: #FFFFFF;
            border: 1px solid #FF3300;
            margin-bottom: 5px;
            padding: 3px 10px;
            border-radius: 5px;
        }

        .button:hover {
            background: #009900;
            color: #FFFFFF;
            border: 1px solid #FF3300;
            margin-bottom: 5px;
        }

        .tooltip1 {
            position: relative;
            display: inline-block;
            /* border-bottom: 1px dotted black;*/
        }

        .tooltip1 .tooltiptext1 {
            visibility: hidden;
            width: 400px;
            background-color: #000000;
            color: #FFFFFF;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            left: 50%;
            top: 120%;
            margin-left: -200px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip1 .tooltiptext1::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
        }

        .tooltip1:hover .tooltiptext1 {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper" class="admin">

   
   
   <?php include'includes/left-side.php'; ?>

               

           
    <div class="content-body">
        <div class="container">
            <div class="row">
            
              
               
         
                      <?php
                            if ($_REQUEST['userid']) {
                                $sqlfist = "SELECT * FROM `or_genealogy` WHERE `userid`='" . trim($_REQUEST['userid']) . "'";
                            } else {
                                $sqlfist = "SELECT * FROM `or_genealogy` WHERE `userid`='" . getMember($conn, $_SESSION['mid'], 'userid') . "'";
                            }
                            $resfist = query($conn, $sqlfist);
                            $numfist = numrows($resfist);
                            if ($numfist > 0) {
                                $fetchfist = fetcharray($resfist);
                                $userid = $fetchfist['userid'];
                            ?>

                                    <table width="800" align="center">
                                        <tr>
                                            <td align="center" colspan="2">
                                                <table align="center" width="50%">
                                                    <td align="right">
                                                        <h3 style="color:#000000;">Left Team:
                                                            <?= getDownlineCount($conn, $userid, 'left') ?>
                                                        </h3>
                                                    </td>
                                                    <td align="center" colspan="2">
                                                        <a href="tree-view.php?userid=<?= $userid ?>" style="text-decoration:none;">
                                                            <div class="boxDiv" align="center">

                                                                <div class="tooltip1">

                                                                    <img src="genealogy.png" width="50" height="50" />
                                                                    <span class="tooltiptext1">
                                                                    <table width="100%">

                                                                        <tr height="20">
                                                                            <td>&nbsp;</td>
                                                                            <td align="left">Sponsor ID:&nbsp;<?php if (getMemberUserid($conn, $userid, 'sponsor')) { ?><?= getMemberUserid($conn, $userid, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                            </td>
                                                                            <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid, 'date') ?></td>
                                                                        </tr>
                                                                        <tr height="20">
                                                                            <td>&nbsp;</td>
                                                                            <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid, 'approved')) { ?><?= getMemberUserid($conn, $userid, 'approved') ?><?php } else { ?>----<?php } ?></td>
                                                                        </tr>

                                                                        <tr height="20">
                                                                            <td>&nbsp;</td>
                                                                            <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                    <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                    <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                        </tr>

                                        <tr height="20">
                                            <td>&nbsp;</td>
                                            <td align="left">Left Team:&nbsp;
                                                <?= getDownlineCount($conn, $userid, 'left') ?>
                                            </td>
                                            <td align="left">Right Team:&nbsp;
                                                <?= getDownlineCount($conn, $userid, 'right') ?>
                                            </td>
                                        </tr>

                                        </table>

                                        </span>
                                        </div>
                                        <br />
                                        <table width="100%">
                                            <tr>
                                                <td align="left"></td>
                                                <td align="center">
                                                    <?= ucwords(strtolower(getMemberUserid($conn, $userid, 'name'))) ?><br /> (
                                                        <?= $userid ?>)
                                                </td>
                                                <td align="right"></td>
                                            </tr>
                                        </table>
                                        </div>
                                        </a>
                                        </td>
                                        <td align="left">
                                            <h3 style="color:#000000;">Right Team:
                                                <?= getDownlineCount($conn, $userid, 'right') ?>
                                            </h3>
                                        </td>
                                    </table>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" style="text-align:center;"><img src="line1.png" style="margin:0;padding:0;" /></td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table align="center">
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <div class="boxDiv" align="center">
                                                            <?php
                                                            $userid1 = getDownlineByPosition($conn, $userid, 'Left');
                                                            if ($userid1) {
                                                            ?>
                                                                <a href="tree-view.php?userid=<?= $userid1 ?>" style="text-decoration:none;">
                                                                    <div class="boxDiv" align="center">
                                                                        <br />
                                                                        <div class="tooltip1">

                                                                            <img src="genealogy.png" width="50" height="50" />
                                                                            <span class="tooltiptext1">
                                                                                <table width="100%">

                                                                                    <tr height="20">
                                                                                        <td>&nbsp;</td>
                                                                                        <td align="left">Sponsor ID:&nbsp;
                                                                                            <?php if (getMemberUserid($conn, $userid1, 'sponsor')) { ?><?= getMemberUserid($conn, $userid1, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                        </td>
                                                                                        <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid1, 'date') ?></td>
                                                                                    </tr>

                                                                                    <tr height="20">
                                                                                        <td>&nbsp;</td>

                                                                                        <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid1, 'approved')) { ?><?= getMemberUserid($conn, $userid1, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                    </tr>
                                                                                    <tr height="20">
                                                                                        <td>&nbsp;</td>
                                                                                        <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid1, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                            <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                            <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid1, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                    <td align="left">Left Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid1, 'left') ?>
                                                    </td>
                                                    <td align="left">Right Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid1, 'right') ?>
                                                    </td>
                                                </tr>

                                            </table>

                                            </span>
                                            </div>


                                            <br />
                                            <?= ucwords(strtolower(getMemberUserid($conn, $userid1, 'name'))) ?><br /> (
                                                <?= $userid1 ?>)


                                                    </div>
                                                    </a>
                                                    <?php } else { ?>
                                                    <p></p>
                                                    <?php if ($userid) { ?>
                                                    <a onClick="newJoinMember('<?= $userid ?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                    <?php } else { ?>
                                                    <img src="new.png" />
                                                    <?php } ?>
                                                    <p>&nbsp;</p>
                                                    <?php } ?>
                                                    </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line2.png" style="margin:0;padding:0;" /></td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table align="center" width="200">
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <div class="boxDiv" align="center">
                                                            <?php
                                                                        $userid3 = getDownlineByPosition($conn, $userid1, 'Left');
                                                                        if ($userid3) {
                                                                        ?>
                                                                <a href="tree-view.php?userid=<?= $userid3 ?>" style="text-decoration:none;">
                                                                    <div class="boxDiv" align="center">
                                                                        <br />

                                                                        <div class="tooltip1">
                                                                            <img src="genealogy.png" width="50" height="50" />

                                                                            <span class="tooltiptext1">

                                                                                            <table width="100%">

                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Sponsor ID:&nbsp;
                                                                                                        <?php if (getMemberUserid($conn, $userid3, 'sponsor')) { ?><?= getMemberUserid($conn, $userid3, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                    </td>
                                                                                                    <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid3, 'date') ?></td>
                                                                                                </tr>

                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>

                                                                                                    <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid3, 'approved')) { ?><?= getMemberUserid($conn, $userid3, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                </tr>
                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid3, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                            <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                            <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid3, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                    <td align="left">Left Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid3, 'left') ?>
                                                    </td>
                                                    <td align="left">Right Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid3, 'right') ?>
                                                    </td>
                                                </tr>

                                            </table>
                                            </span>
                                            </div>
                                            <br />
                                            <?= ucwords(strtolower(getMemberUserid($conn, $userid3, 'name'))) ?>
                                                </br> (
                                                <?= $userid3 ?>)
                                                    </div>

                                                    </a>
                                                    <?php } else { ?>
                                                    <p></p>
                                                    <?php if ($userid1) { ?>
                                                    <a onClick="newJoinMember('<?= $userid1 ?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                    <?php } else { ?>
                                                    <img src="new.png" />
                                                    <?php } ?>
                                                    <p>&nbsp;</p>
                                                    <?php } ?>
                                                    </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td>
                                    </tr>
                                    <tr>
                                        <td width="99" align="center" valign="top">
                                            <table align="center">
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <div class="boxDiv" align="center">
                                                            <?php
                                                                                    $userid7 = getDownlineByPosition($conn, $userid3, 'Left');
                                                                                    if ($userid7) {
                                                                                    ?>
                                                                <a href="tree-view.php?userid=<?= $userid7 ?>" style="text-decoration:none;">
                                                                    <div class="boxDiv" align="center">
                                                                        <br />
                                                                        <div class="tooltip1">
                                                                            <img src="genealogy.png" width="50" height="50" />

                                                                            <span class="tooltiptext1">

                                                                                                        <table width="100%">

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid7, 'sponsor')) { ?><?= getMemberUserid($conn, $userid7, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid7, 'date') ?></td>
                                                                                                            </tr>

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>

                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid7, 'approved')) { ?><?= getMemberUserid($conn, $userid7, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid7, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                            <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                            <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid7, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                    <td align="left">Left Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid7, 'left') ?>
                                                    </td>
                                                    <td align="left">Right Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid7, 'right') ?>
                                                    </td>
                                                </tr>

                                            </table>
                                            </span>
                                            </div>


                                            <br />
                                            <?= ucwords(strtolower(getMemberUserid($conn, $userid7, 'name'))) ?> <br /> (
                                                <?= $userid7 ?>)

                                                    </div>
                                                    </a>
                                                    <?php } else { ?>
                                                    <p></p>
                                                    <?php if ($userid3) { ?>
                                                    <a onClick="newJoinMember('<?= $userid3 ?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                    <?php } else { ?>
                                                    <img src="new.png" />
                                                    <?php } ?>
                                                    <p>&nbsp;</p>
                                                    <?php } ?>
                                                    </div>
                                        </td>
                                    </tr>
                                    </table>
                                    </td>
                                    <td width="87" align="center" valign="top">
                                        <table align="center">
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class="boxDiv" align="center">
                                                        <?php
                                                                                    $userid8 = getDownlineByPosition($conn, $userid3, 'Right');
                                                                                    if ($userid8) {
                                                                                    ?>
                                                            <a href="tree-view.php?userid=<?= $userid8 ?>" style="text-decoration:none;">
                                                                <div class="boxDiv" align="center">
                                                                    <br />
                                                                    <div class="tooltip1">
                                                                        <img src="genealogy.png" width="50" height="50" />

                                                                        <span class="tooltiptext1">
                                                                                                        <table width="100%">
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid8, 'sponsor')) { ?><?= getMemberUserid($conn, $userid8, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid8, 'date') ?></td>
                                                                                                            </tr>

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>

                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid8, 'approved')) { ?><?= getMemberUserid($conn, $userid8, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid8, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                        <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                        <?php } ?>
                                                </td>
                                                <td align="left">
                                                    Pay_Status:&nbsp;
                                                    <?php if (getMemberUserid($conn, $userid8, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                    <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr height="20">
                                                <td>&nbsp;</td>
                                                <td align="left">Left Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid8, 'left') ?>
                                                </td>
                                                <td align="left">Right Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid8, 'right') ?>
                                                </td>
                                            </tr>

                                        </table>

                                        </span>
                                        </div>


                                        <br />
                                        <?= ucwords(strtolower(getMemberUserid($conn, $userid8, 'name'))) ?> <br /> (
                                            <?= $userid8 ?>)
                                                </div>
                                                </a>
                                                <?php } else { ?>
                                                <p></p>
                                                <?php if ($userid3) { ?>
                                                <a onClick="newJoinMember('<?= $userid3 ?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                <?php } else { ?>
                                                <img src="new.png" />
                                                <?php } ?>
                                                <p>&nbsp;</p>
                                                <?php } ?>
                                                </div>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    </tr>

                                    </table>
                                    </td>
                                    <td align="center" valign="top">
                                        <table align="center" width="200">
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class="boxDiv" align="center">
                                                        <?php
                                                                        $userid4 = getDownlineByPosition($conn, $userid1, 'Right');
                                                                        if ($userid4) {
                                                                        ?>
                                                            <a href="tree-view.php?userid=<?= $userid4 ?>" style="text-decoration:none;">
                                                                <div class="boxDiv" align="center">
                                                                    <br />

                                                                    <div class="tooltip1">
                                                                        <img src="genealogy.png" width="50" height="50" />

                                                                        <span class="tooltiptext1">

                                                                                            <table width="100%">
                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Sponsor ID:&nbsp;
                                                                                                        <?php if (getMemberUserid($conn, $userid4, 'sponsor')) { ?><?= getMemberUserid($conn, $userid4, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                    </td>
                                                                                                    <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid4, 'date') ?></td>
                                                                                                </tr>

                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>

                                                                                                    <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid4, 'approved')) { ?><?= getMemberUserid($conn, $userid4, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                </tr>
                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid4, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                        <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                        <?php } ?>
                                                </td>
                                                <td align="left">
                                                    Pay_Status:&nbsp;
                                                    <?php if (getMemberUserid($conn, $userid4, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                    <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <tr height="20">
                                                <td>&nbsp;</td>
                                                <td align="left">Left Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid4, 'left') ?>
                                                </td>
                                                <td align="left">Right Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid4, 'right') ?>
                                                </td>
                                            </tr>

                                        </table>
                                        </span>
                                        </div>
                                        <br />
                                        <?= ucwords(strtolower(getMemberUserid($conn, $userid4, 'name'))) ?> <br /> (
                                            <?= $userid4 ?>)

                                                </div>
                                                </a>
                                                <?php } else { ?>
                                                <p></p>
                                                <?php if ($userid1) { ?>
                                                <a onClick="newJoinMember('<?= $userid1 ?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                <?php } else { ?>
                                                <img src="new.png" />
                                                <?php } ?>
                                                <p>&nbsp;</p>
                                                <?php } ?>
                                                </div>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <table align="center">
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <div class="boxDiv" align="center">
                                                            <?php
                                                                                    $userid9 = getDownlineByPosition($conn, $userid4, 'Left');
                                                                                    if ($userid9) {
                                                                                    ?>
                                                                <a href="tree-view.php?userid=<?= $userid9 ?>" style="text-decoration:none;">
                                                                    <div class="boxDiv" align="center">
                                                                        <br />
                                                                        <div class="tooltip1">
                                                                            <img src="genealogy.png" width="50" height="50" />

                                                                            <span class="tooltiptext1">
                                                                                                        <table width="100%">

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid9, 'sponsor')) { ?><?= getMemberUserid($conn, $userid9, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid9, 'date') ?></td>
                                                                                                            </tr>

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>

                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid9, 'approved')) { ?><?= getMemberUserid($conn, $userid9, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid9, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                            <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                            <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid9, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                    <td align="left">Left Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid9, 'left') ?>
                                                    </td>
                                                    <td align="left">Right Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid9, 'right') ?>
                                                    </td>
                                                </tr>

                                            </table>

                                            </span>
                                            </div>


                                            <br />
                                            <?= ucwords(strtolower(getMemberUserid($conn, $userid9, 'name'))) ?> <br /> (
                                                <?= $userid9 ?>)

                                                    </div>
                                                    </a>
                                                    <?php } else { ?>
                                                    <p></p>
                                                    <?php if ($userid4) { ?>
                                                    <a onClick="newJoinMember('<?= $userid4 ?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                    <?php } else { ?>
                                                    <img src="new.png" />
                                                    <?php } ?>
                                                    <p>&nbsp;</p>
                                                    <?php } ?>
                                                    </div>
                                        </td>
                                    </tr>

                                    </table>
                                    </td>
                                    <td align="center">
                                        <table align="center">
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class="boxDiv" align="center">
                                                        <?php
                                                                                    $userid10 = getDownlineByPosition($conn, $userid4, 'Right');
                                                                                    if ($userid10) {
                                                                                    ?>
                                                            <a href="tree-view.php?userid=<?= $userid10 ?>" style="text-decoration:none;">
                                                                <div class="boxDiv" align="center">
                                                                    <br />

                                                                    <div class="tooltip1">
                                                                        <img src="genealogy.png" width="50" height="50" />

                                                                        <span class="tooltiptext1">

                                                                                                        <table width="100%">

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid10, 'sponsor')) { ?><?= getMemberUserid($conn, $userid10, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid10, 'date') ?></td>
                                                                                                            </tr>

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>

                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid10, 'approved')) { ?><?= getMemberUserid($conn, $userid10, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid10, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                        <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                        <?php } ?>
                                                </td>
                                                <td align="left">
                                                    Pay_Status:&nbsp;
                                                    <?php if (getMemberUserid($conn, $userid10, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                    <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <tr height="20">
                                                <td>&nbsp;</td>
                                                <td align="left">Left Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid10, 'left') ?>
                                                </td>
                                                <td align="left">Right Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid10, 'right') ?>
                                                </td>
                                            </tr>

                                        </table>
                                        </span>
                                        </div>


                                        <br />
                                        <?= ucwords(strtolower(getMemberUserid($conn, $userid10, 'name'))) ?><br /> (
                                            <?= $userid10 ?>)


                                                </div>
                                                </a>
                                                <?php } else { ?>
                                                <p></p>
                                                <?php if ($userid4) { ?>
                                                <a onClick="newJoinMember('<?= $userid4 ?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                <?php } else { ?>
                                                <img src="new.png" />
                                                <?php } ?>
                                                <p>&nbsp;</p>
                                                <?php } ?>
                                                </div>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    </tr>

                                    </table>
                                    </td>
                                    <td align="center" valign="top">
                                        <table align="center">
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class="boxDiv" align="center">
                                                        <?php
                                                            $userid2 = getDownlineByPosition($conn, $userid, 'Right');
                                                            if ($userid2) {
                                                            ?>
                                                            <a href="tree-view.php?userid=<?= $userid2 ?>" style="text-decoration:none;">
                                                                <div class="boxDiv" align="center">
                                                                    <br />

                                                                    <div class="tooltip1">
                                                                        <img src="genealogy.png" width="50" height="50" />

                                                                        <span class="tooltiptext1">
                                                                                <table width="100%">

                                                                                    <tr height="20">
                                                                                        <td>&nbsp;</td>
                                                                                        <td align="left">Sponsor ID:&nbsp;
                                                                                            <?php if (getMemberUserid($conn, $userid2, 'sponsor')) { ?><?= getMemberUserid($conn, $userid2, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                        </td>
                                                                                        <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid2, 'date') ?></td>
                                                                                    </tr>

                                                                                    <tr height="20">
                                                                                        <td>&nbsp;</td>

                                                                                        <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid2, 'approved')) { ?><?= getMemberUserid($conn, $userid2, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                    </tr>
                                                                                    <tr height="20">
                                                                                        <td>&nbsp;</td>
                                                                                        <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid2, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                        <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                        <?php } ?>
                                                </td>
                                                <td align="left">
                                                    Pay_Status:&nbsp;
                                                    <?php if (getMemberUserid($conn, $userid2, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                    <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <tr height="20">
                                                <td>&nbsp;</td>
                                                <td align="left">Left Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid2, 'left') ?>
                                                </td>
                                                <td align="left">Right Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid2, 'right') ?>
                                                </td>
                                            </tr>

                                        </table>

                                        </span>
                                        </div>


                                        <br />
                                        <?= ucwords(strtolower(getMemberUserid($conn, $userid2, 'name'))) ?> <br /> (
                                            <?= $userid2 ?>)

                                                </div>
                                                </a>
                                                <?php } else { ?>
                                                <p></p>
                                                <?php if ($userid) { ?>
                                                <a onClick="newJoinMember('<?= $userid ?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                <?php } else { ?>
                                                <img src="new.png" />
                                                <?php } ?>
                                                <p>&nbsp;</p>
                                                <?php } ?>
                                                </div>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line2.png" style="margin:0;padding:0;" /></td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table align="center" width="200">
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <div class="boxDiv" align="center">
                                                            <?php
                                                                        $userid5 = getDownlineByPosition($conn, $userid2, 'Left');
                                                                        if ($userid5) {
                                                                        ?>
                                                                <a href="tree-view.php?userid=<?= $userid5 ?>" style="text-decoration:none;">
                                                                    <div class="boxDiv" align="center">
                                                                        <br />

                                                                        <div class="tooltip1">
                                                                            <img src="genealogy.png" width="50" height="50" />

                                                                            <span class="tooltiptext1">
                                                                                            <table width="100%">

                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Sponsor ID:&nbsp;
                                                                                                        <?php if (getMemberUserid($conn, $userid5, 'sponsor')) { ?><?= getMemberUserid($conn, $userid5, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                    </td>
                                                                                                    <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid5, 'date') ?></td>
                                                                                                </tr>

                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>

                                                                                                    <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid5, 'approved')) { ?><?= getMemberUserid($conn, $userid5, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                </tr>
                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid5, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                            <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                            <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid5, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                    <td align="left">Left Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid5, 'left') ?>
                                                    </td>
                                                    <td align="left">Right Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid5, 'right') ?>
                                                    </td>
                                                </tr>

                                            </table>

                                            </span>
                                            </div>


                                            <br />
                                            <?= ucwords(strtolower(getMemberUserid($conn, $userid5, 'name'))) ?><br /> (
                                                <?= $userid5 ?>)


                                                    </div>
                                                    </a>
                                                    <?php } else { ?>
                                                    <p></p>
                                                    <?php if ($userid2) { ?>
                                                    <a onClick="newJoinMember('<?= $userid2 ?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                    <?php } else { ?>
                                                    <img src="new.png" />
                                                    <?php } ?>
                                                    <p>&nbsp;</p>
                                                    <?php } ?>
                                                    </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table align="center">
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <div class="boxDiv" align="center">
                                                            <?php
                                                                                    $userid11 = getDownlineByPosition($conn, $userid5, 'Left');
                                                                                    if ($userid11) {
                                                                                    ?>
                                                                <a href="tree-view.php?userid=<?= $userid11 ?>" style="text-decoration:none;">
                                                                    <div class="boxDiv" align="center">
                                                                        <br />


                                                                        <div class="tooltip1">
                                                                            <img src="genealogy.png" width="50" height="50" />

                                                                            <span class="tooltiptext1">

                                                                                                        <table width="100%">

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid11, 'sponsor')) { ?><?= getMemberUserid($conn, $userid11, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid11, 'date') ?></td>
                                                                                                            </tr>

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>

                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid11, 'approved')) { ?><?= getMemberUserid($conn, $userid11, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid11, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                            <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                            <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid11, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                    <td align="left">Left Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid11, 'left') ?>
                                                    </td>
                                                    <td align="left">Right Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid11, 'right') ?>
                                                    </td>
                                                </tr>

                                            </table>


                                            </span>
                                            </div>

                                            <br />
                                            <?= ucwords(strtolower(getMemberUserid($conn, $userid11, 'name'))) ?><br /> (
                                                <?= $userid11 ?>)

                                                    </div>
                                                    </a>
                                                    <?php } else { ?>
                                                    <p></p>
                                                    <?php if ($userid5) { ?>
                                                    <a onClick="newJoinMember('<?= $userid5 ?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                    <?php } else { ?>
                                                    <img src="new.png" />
                                                    <?php } ?>
                                                    <p>&nbsp;</p>
                                                    <?php } ?>
                                                    </div>
                                        </td>
                                    </tr>

                                    </table>
                                    <td align="center" valign="top">
                                        <table align="center">
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class="boxDiv" align="center">
                                                        <?php
                                                                                    $userid12 = getDownlineByPosition($conn, $userid5, 'Right');
                                                                                    if ($userid12) {
                                                                                    ?>
                                                            <a href="tree-view.php?userid=<?= $userid12 ?>" style="text-decoration:none;">
                                                                <div class="boxDiv" align="center">
                                                                    <br />
                                                                    <div class="tooltip1">
                                                                        <img src="genealogy.png" width="50" height="50" />

                                                                        <span class="tooltiptext1">
                                                                                                        <table width="100%">

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid12, 'sponsor')) { ?><?= getMemberUserid($conn, $userid12, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid12, 'date') ?></td>
                                                                                                            </tr>

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>

                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid12, 'approved')) { ?><?= getMemberUserid($conn, $userid12, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid12, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                        <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                        <?php } ?>
                                                </td>
                                                <td align="left">
                                                    Pay_Status:&nbsp;
                                                    <?php if (getMemberUserid($conn, $userid12, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                    <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <tr height="20">
                                                <td>&nbsp;</td>
                                                <td align="left">Left Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid12, 'left') ?>
                                                </td>
                                                <td align="left">Right Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid12, 'right') ?>
                                                </td>
                                            </tr>

                                        </table>


                                        </span>
                                        </div>



                                        <br />
                                        <?= ucwords(strtolower(getMemberUserid($conn, $userid12, 'name'))) ?> <br /> (
                                            <?= $userid12 ?>)

                                                </div>
                                                </a>
                                                <?php } else { ?>
                                                <p></p>
                                                <?php if ($userid5) { ?>
                                                <a onClick="newJoinMember('<?= $userid5 ?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                <?php } else { ?>
                                                <img src="new.png" />
                                                <?php } ?>
                                                <p>&nbsp;</p>
                                                <?php } ?>
                                                </div>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    <td align="center" valign="top">
                                        <table align="center" width="200">
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class="boxDiv" align="center">
                                                        <?php
                                                                        $userid6 = getDownlineByPosition($conn, $userid2, 'Right');
                                                                        if ($userid6) {
                                                                        ?>
                                                            <a href="tree-view.php?userid=<?= $userid6 ?>" style="text-decoration:none;">
                                                                <div class="boxDiv" align="center">
                                                                    <br />

                                                                    <div class="tooltip1">
                                                                        <img src="genealogy.png" width="50" height="50" />

                                                                        <span class="tooltiptext1">
                                                                                            <table width="100%">

                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Sponsor ID:&nbsp;
                                                                                                        <?php if (getMemberUserid($conn, $userid6, 'sponsor')) { ?><?= getMemberUserid($conn, $userid6, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                    </td>
                                                                                                    <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid6, 'date') ?></td>
                                                                                                </tr>
                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid6, 'approved')) { ?><?= getMemberUserid($conn, $userid6, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                </tr>
                                                                                                <tr height="20">
                                                                                                    <td>&nbsp;</td>
                                                                                                    <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid6, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                        <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                        <?php } ?>
                                                </td>
                                                <td align="left">
                                                    Pay_Status:&nbsp;
                                                    <?php if (getMemberUserid($conn, $userid6, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                    <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <tr height="20">
                                                <td>&nbsp;</td>
                                                <td align="left">Left Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid6, 'left') ?>
                                                </td>
                                                <td align="left">Right Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid6, 'right') ?>
                                                </td>
                                            </tr>
                                        </table>
                                        </span>

                                        </div>


                                        <br />
                                        <?= ucwords(strtolower(getMemberUserid($conn, $userid6, 'name'))) ?><br /> (
                                            <?= $userid6 ?>)

                                                </div>
                                                </a>
                                                <?php } else { ?>
                                                <p></p>
                                                <?php if ($userid2) { ?>
                                                <a onClick="newJoinMember('<?= $userid2 ?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                <?php } else { ?>
                                                <img src="new.png" />
                                                <?php } ?>
                                                <p>&nbsp;</p>
                                                <?php } ?>
                                                </div>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table align="center">
                                                <tr>
                                                    <td align="center" colspan="2">
                                                        <div class="boxDiv" align="center">
                                                            <?php
                                                                                    $userid13 = getDownlineByPosition($conn, $userid6, 'Left');
                                                                                    if ($userid13) {
                                                                                    ?>
                                                                <a href="tree-view.php?userid=<?= $userid13 ?>" style="text-decoration:none;">
                                                                    <div class="boxDiv" align="center">
                                                                        <br />

                                                                        <div class="tooltip1">
                                                                            <img src="genealogy.png" width="50" height="50" />

                                                                            <span class="tooltiptext1">

                                                                                                        <table width="100%">

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid13, 'sponsor')) { ?><?= getMemberUserid($conn, $userid13, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid13, 'date') ?></td>
                                                                                                            </tr>

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>

                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid13, 'approved')) { ?><?= getMemberUserid($conn, $userid13, 'approved') ?><?php } else { ?>----<?php } ?></td>

                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid13, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                            <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                            <?php } ?>
                                                    </td>
                                                    <td align="left">
                                                        Pay_Status:&nbsp;
                                                        <?php if (getMemberUserid($conn, $userid13, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                        <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                    <td align="left">Left Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid13, 'left') ?>
                                                    </td>
                                                    <td align="left">Right Team:&nbsp;
                                                        <?= getDownlineCount($conn, $userid13, 'right') ?>
                                                    </td>
                                                </tr>
                                            </table>

                                            </span>

                                            </div>



                                            <br />
                                            <?= ucwords(strtolower(getMemberUserid($conn, $userid13, 'name'))) ?><br /> (
                                                <?= $userid13 ?>)
                                                    </div>
                                                    </a>
                                                    <?php } else { ?>
                                                    <p></p>
                                                    <?php if ($userid6) { ?>
                                                    <a onClick="newJoinMember('<?= $userid6 ?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                    <?php } else { ?>
                                                    <img src="new.png" />
                                                    <?php } ?>
                                                    <p>&nbsp;</p>
                                                    <?php } ?>
                                                    </div>
                                        </td>
                                    </tr>

                                    </table>
                                    </td>
                                    <td align="center" valign="top">
                                        <table align="center">
                                            <tr>
                                                <td align="center" colspan="2">
                                                    <div class="boxDiv" align="center">
                                                        <?php
                                                                                    $userid14 = getDownlineByPosition($conn, $userid6, 'Right');
                                                                                    if ($userid14) {
                                                                                    ?>
                                                            <a href="tree-view.php?userid=<?= $userid14 ?>" style="text-decoration:none;">
                                                                <div class="boxDiv" align="center">
                                                                    <br />


                                                                    <div class="tooltip1">
                                                                        <img src="genealogy.png" width="50" height="50" />

                                                                        <span class="tooltiptext1">

                                                                                                        <table width="100%">

                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Sponsor ID:&nbsp;
                                                                                                                    <?php if (getMemberUserid($conn, $userid14, 'sponsor')) { ?><?= getMemberUserid($conn, $userid14, 'sponsor') ?><?php } else { ?>----<?php } ?>
                                                                                                                </td>
                                                                                                                <td align="left">Joining Date:&nbsp;<?= getMemberUserid($conn, $userid14, 'date') ?></td>
                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Approved Date:&nbsp;<?php if (getMemberUserid($conn, $userid14, 'approved')) { ?><?= getMemberUserid($conn, $userid14, 'approved') ?><?php } else { ?>----<?php } ?></td>
                                                                                                            </tr>
                                                                                                            <tr height="20">
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td align="left">Status:&nbsp;<?php if (getMemberUserid($conn, $userid14, 'status') == 'A') { ?><span style="color:#009900;">Active</span>
                                                                        <?php } else { ?><span style="color:#FF0000;">Inactive</span>
                                                                        <?php } ?>
                                                </td>
                                                <td align="left">
                                                    Pay_Status:&nbsp;
                                                    <?php if (getMemberUserid($conn, $userid14, 'paystatus') == 'A') { ?><span style="color:#009900;">Paid</span>
                                                    <?php } else { ?><span style="color:#FF0000;">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <tr height="20">
                                                <td>&nbsp;</td>
                                                <td align="left">Left Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid14, 'left') ?>
                                                </td>
                                                <td align="left">Right Team:&nbsp;
                                                    <?= getDownlineCount($conn, $userid14, 'right') ?>
                                                </td>
                                            </tr>
                                        </table>
                                        </span>
                                        </div>

                                        <br />
                                        <?= ucwords(strtolower(getMemberUserid($conn, $userid14, 'name'))) ?> <br /> (
                                            <?= $userid14 ?>)


                                                </div>
                                                </a>
                                                <?php } else { ?>
                                                <p></p>
                                                <?php if ($userid6) { ?>
                                                <a onClick="newJoinMember('<?= $userid6 ?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
                                                <?php } else { ?>
                                                <img src="new.png" />

                                                <?php } ?>
                                                <p>&nbsp;</p>
                                                <?php } ?>
                                                </div>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    </table>

                                    <?php } ?>

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