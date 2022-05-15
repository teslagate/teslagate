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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile | <?= $title ?> </title>
   

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
                            <h3>Profile</h3>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="#">Settings </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Profile</a></div>
                    </div>
                </div>
            </div>
            <ul class="settings-menu">
                <li><a href="settings-profile.html">Profile</a></li>
                <li class=""><a href="settings-application.html">Application</a></li>
                <li class=""><a href="settings-security.html">Security</a></li>
                <li class=""><a href="settings-activity.html">Activity</a></li>
                <li class=""><a href="settings-payment-method.html">Payment Method</a></li>
                <li class=""><a href="settings-api.html">API</a></li>
            </ul>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <h4 class="card-title mb-3">User Profile</h4>
                    <div class="card">
                        <div class="card-body">
                        <?php
                        $paystatus = getMember($conn, $_SESSION['mid'], 'paystatus');
                        if ($paystatus == 'A') {
                        ?>
                            <?php if (isset($_REQUEST['m']) == '1') { ?><div align="center" style="color:#009900;font-size:16px;">Your profile is successfully updated!</div><?php } ?>
                            <?php if (isset($_REQUEST['e']) == '1') { ?><div align="center" style="color:#FF3300;font-size:16px;">Pancard No already used in another account!</div><?php } ?>

                            <form class="form" action="edit-profile-process.php" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3"><label class="form-label">Full Name</label> <input type="text" class="form-control" name="name" placeholder="Name" value="<?= getMember($conn, $_SESSION['mid'], 'name') ?>" <?php if (getMember($conn, $_SESSION['mid'], 'name') != '') { ?>readonly="readonly" <?php } ?> required /></div>
                                    <div class="col-xxl-12">
                                        <div class="d-flex align-items-center mb-3"><img
                                                class="me-3 rounded-circle me-0 me-sm-3" src="images/profile/3.png"
                                                width="55" height="55" alt="">
                                            <div class="media-body">
                                                <h4 class="mb-0"><?=getMember($conn,$_SESSION['mid'],'name')?></h4>
                                                <p class="mb-0">Max file size is 20mb</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><input name="photo" type="file" class="" ></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <h4 class="card-title mb-3">Update Profile</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-12 mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" placeholder="Email" value="<?= getMember($conn, $_SESSION['mid'], 'email') ?>" <?php if (getMember($conn, $_SESSION['mid'], 'email') != '') { ?>readonly="readonly" <?php } ?>required /></div>
                                    <div class="col-12 mb-3"><label class="form-label">Password</label><input
                                            name="password" type="text" class="form-control" ></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12">
                    <h4 class="card-title mb-3">Personal Information</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="form" action="edit-profile-process.php" method="post">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-3"><label class="form-label">Full
                                            Name</label><input type="text" class="form-control" name="name" placeholder="Name" value="<?= getMember($conn, $_SESSION['mid'], 'name') ?>" <?php if (getMember($conn, $_SESSION['mid'], 'name') != '') { ?> <?php } ?> required /></div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-3"><label
                                            class="form-label">Phone</label><input type="text" class="form-control" id="phone" name="phone" value="<?= getMember($conn, $_SESSION['mid'], 'phone') ?>" placeholder="Phone Number" <?php if (getMember($conn, $_SESSION['mid'], 'phone') != '') { ?>readonly="readonly" <?php } ?> maxlength="10" pattern="[6-9]{1}[0-9]{9}" required /></div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-3"><label
                                            class="form-label">Address</label> <input type="text" class="form-control" value="<?= getMember($conn, $_SESSION['mid'], 'address') ?>" name="address" id="address" placeholder="Address" <?php if (getMember($conn, $_SESSION['mid'], 'address') != '') { ?> <?php } ?> required /></div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-3"><label
                                            class="form-label">City</label><input name="city" type="text"
                                            class="form-control" ></div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-3"><label class="form-label">Post
                                            Code</label><input name="postal" type="text" class="form-control" >
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-3"><label
                                            class="form-label">Country</label><select name="country"
                                            class="form-control">
                                            <option value="Turkey">Turkey</option>
                                            <option value="United States">United States</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                        </select></div>
                                </div>
                                <div class="mt-3"><button class="btn btn-success">Update Now</button></div>
                            </form>
                            <?php } else { ?>
                            <p align="center" style="color:#FF0000;">Your account is inactive! Kindly active your account!</p>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="js/scripts.js"></script>


</body>



</html>