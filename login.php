<?php
include('administrator/includes/function.php');
?>

<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In | MetaInv</title>
    <meta name="description" content="Sign in MetaInv">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div class="authincation section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-5 col-md-6">
                <div class="mini-logo text-center my-4"><a href="index-2.html"><img src="images/logo.png" alt=""></a>
                    <h4 class="card-title mt-5">Sign in to MetaInv</h4>
                </div>
                <div class="auth-form card">
                    <div class="card-body">
                        <form action="login-process.php" method="post">
                            <div class="row">
                                <div class="col-12 mb-3"><label class="form-label">Username ID</label><input type="text" class="form-control" name="userid" id="userid" placeholder="Username ID" required></div>
                                <div class="col-12 mb-3"><label class="form-label">Password</label><input type="password" class="form-control" name="password" id="password" placeholder="Password" required ></div>
                                <div class="col-6">
                                    <div class="form-check"><input name="acceptTerms" type="checkbox"
                                            class="form-check-input " value=""><label class="form-check-label">Remember
                                            me</label></div>
                                </div>
                                <div class="col-6 text-end"><a href="#">Forgot Password?</a></div>
                            </div>
                            <div class="mt-3 d-grid gap-2"><button id="saveForm" name="saveForm" type="submit" value="Sign in" class="btn btn-primary mr-2">Sign In</button></div>
                        </form>
                        <p class="mt-3 mb-0">Don't have an account?<a class="text-primary" href="registration.php">Sign
                                up</a>
                        </p>
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