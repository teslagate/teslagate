<?php
include('administrator/includes/function.php');
include('includes/api.php');
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Companies | <?= $title ?></title>
    <meta name="description"
        content="Dashboard">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper" class="admin">

   
   
   <?php include'includes/menu.php'; ?>

               

     <div class="top-collection section-padding">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section-title text-center">
                        <h2>Top company over last 7 days</h2>
                        <p><span>MetaInv</span>Makes Everyone Think and Win.</p>
                         <a class="btn btn-primary" href="company-details.php">Create a Company</a>
                    </div>
                </div>
            </div>


            <div class="row align-items-center">
                  <?php
                    $sql = "SELECT * FROM `or_company`  ORDER BY `id`";
                    $res = query($conn, $sql);

                    while ($fetch = fetcharray($res)) {
                        ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <a class="top-collection-content d-block" href="#">
                        <div class="d-flex align-items-center"><span class="serial">1
                                <!-- -->.
                            </span>
                            <div class="flex-shrink-0"><span class="top-img"><img class="img-fluid"
                                        src="images/items/1.jpg" alt="" width="70"></span></div>
                            <div class="flex-grow-1 ms-3">
                                <h5><?php echo $fetch['company_name']   ?></h5>
                                <p class="text-muted">Fondation: <?php echo $fetch['f_year'] ?></p>
                            </div>
                           
                        </div>
                    </a>
                </div>
               <?php  } ?>
               
            
            </div>
        </div>
    </div>

        <!-- top companies end  -->



    
</div>


   <?php include'includes/footer.php'; ?>
