
<!DOCTYPE html>
<?php
include('administrator/includes/function.php');
?>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invite Earn for Registration</title>
    <meta name="description"
        content="Registration page on MetaInv">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">


    <script>
        addEventListener("load", function() {

            setTimeout(hideURLbar, 0);

        }, false);



        function hideURLbar() {

            window.scrollTo(0, 1);

        }
    </script>

    <script src="js/ajax.js" type="text/javascript"></script>



    <script>
        function getUserIDcheck(val)

        {

            if (val)

            {

                xmlhttp.open('GET', 'get-name.php?userid=' + val);

                xmlhttp.onreadystatechange = getUserIDRequest;

                xmlhttp.send();

            }

        }

        function getUserIDRequest()

        {

            if (xmlhttp.readyState == 4)

            {

                if (xmlhttp.status == 200)

                {



                    var response = xmlhttp.responseText;

                    document.getElementById('sponname').value = response;

                }

            }

        }
    </script>
    <script src="js/ajax.js" type="text/javascript"></script>

    <script>
        function getUserIDcheck(val) {
            if (val) {
                xmlhttp.open('GET', 'get-name.php?userid=' + val);
                xmlhttp.onreadystatechange = getUserIDRequest;
                xmlhttp.send();
            }
        }

        function getUserIDRequest() {
            if (xmlhttp.readyState == 4) {
                if (xmlhttp.status == 200) {

                    var response = xmlhttp.responseText;
                    document.getElementById('sponname').value = response;
                }
            }
        }
    </script>

</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div class="authincation section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-5 col-md-6">
                <div class="mini-logo text-center my-4"><a href="index-2.html"><img src="images/logo.png" alt=""></a>
                    <h4 class="card-title mt-5">Sign up to MetaInv</h4>
                </div>
                <div class="auth-form card">
                    <div class="card-body">
                        <div class="row">
                                  <?php if ($_REQUEST['msg'] == 4) { ?>



                                        <div class="alert alert-success alert-dismissible">

                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                            Your registration is successfully !</strong>
                                        </div>



                                        <div class="alert alert-info alert-dismissible">

                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                            Your User ID: <?= getMember($conn, $_REQUEST['id'], 'userid') ?>&nbsp; And Password: <?= base64_decode(getMember($conn, $_REQUEST['id'], 'password')) ?>
                                        </div>
                                         <a class="btn btn-gradient-warning" type="button" href="login.php">Sign In</a>


                                    <?php } ?>

                                    <?php if ($_REQUEST['q'] == 4) { ?>



                                        <div class="alert alert-warning alert-dismissible">

                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                            Invalid/Inactive Sponsor ID!
                                        </div>

                                    <?php } ?>

                                    <?php if ($_REQUEST['q'] == 9) { ?>

                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            User Name Already Exist!
                                        </div>
                                    <?php } ?>


                                    <?php if ($_REQUEST['e'] == 1) { ?><p align="center" style="color:#FF0000;">Phone number or email id already used!</p><?php } ?>

                                    <?php if ($_REQUEST['e'] == 2) { ?><p align="center" style="color:#FF0000;">Aadhar No already used 6 times!</p><?php } ?>

                                </div>
                                <form name="form1" action="registration-process.php?case=introducer&intr=<?= $_REQUEST['intr'] ?>" method="post">
                                    <h1 class="display-5 mb-5">Create Your Account</h1>
                                    <p class="mb-30">Haven't registered yet! don't worry just fillip all the information below and get your account now.</p>
                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Sponsor ID*</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Sponsor ID" name="sponsor" id="sponsor" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);" value="<?= $_REQUEST['intr'] ?>" />

                                        </div>
                                        <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Sponsor Name" name="sponname" id="sponname" readonly="" style="color:#000000;" value="<?= getMemberUserID($conn, $_REQUEST['intr'], 'name') ?>" required />
                                        </div>
                                        <label>
                                            <input type="radio" name="position" id="option1" value="Left" autocomplete="off" checked> Left
                                        </label>

                                        <label>
                                            <input type="radio" name="position" id="option2" value="Right" autocomplete="off"> Right
                                        </label>
                                    </div>


                                    <div class="form-group">
                                        <input class="form-control" placeholder="Full Name" type="text" name="name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" required placeholder="Phone : (xx-xxx) xxx-xx" data-mask="(99-999) 999-99-99" class="form-control">
                                    </div>
                                    <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="E-Mail Address" aria-label="Email" aria-describedby="basic-addon1" name="email" id="email" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);">
                                        </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Username*</span>
                                        </div>
                                        <input type="text" class="form-control" name="username" id="username" required placeholder="Username for login*" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" type="password" name="password" id="password" placeholder="Enter Password" required>
                                    </div>


                                    <div class="custom-control custom-checkbox mb-25">
                                        <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                        <label class="custom-control-label font-14" for="same-address">I have read and agree to the <a href=""><u>term and conditions</u></a></label>
                                    </div>
                                    <button class="btn btn-primary btn-block" id="saveForm" name="saveForm" type="submit" value="Register Now">Register Now</button>

                                </form>
                        <div class="text-center">
                            <p class="mt-3 mb-0"><a class="text-primary" href="login.php">Sign in</a>to your account</p>
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