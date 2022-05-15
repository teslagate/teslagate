<?php include('includes/api.php');
include('includes/menu.php');
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
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper" class="admin">

   
   

               

           
    <div class="content-body">
        <div class="container">
            <div class="row">
               
              
               <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center">
                        <div class="widget-icon me-3 bg-primary"><span><i class="ri-file-copy-2-line"></i></span></div>
                        <div class="widget-content">
                            <h3>24K</h3>
                            <p>Artworks</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center">
                        <div class="widget-icon me-3 bg-success"><span><i class="ri-file-list-3-line"></i></span></div>
                        <div class="widget-content">
                            <h3>82K</h3>
                            <p>Auction</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center">
                        <div class="widget-icon me-3 bg-warning"><span><i class="ri-file-paper-line"></i></span></div>
                        <div class="widget-content">
                            <h3>200</h3>
                            <p>Creators</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="stat-widget d-flex align-items-center">
                        <div class="widget-icon me-3 bg-danger"><span><i class="ri-file-paper-2-line"></i></span></div>
                        <div class="widget-content">
                            <h3>89</h3>
                            <p>Canceled</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card-header px-0">
                        <h4 class="card-title">Active Bids </h4><a class="btn btn-primary" href="create-invoice.html">Place
                            a Bid</a>
                    </div>
                    <div class="bid-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault1" value=""></div>
                                        </th>
                                        <th>Item List</th>
                                        <th>Open Price</th>
                                        <th>Your Offer</th>
                                        <th>Recent Offer</th>
                                        <th>Time Left</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault2" value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/15.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/1.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault3" value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/16.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/2.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault4" value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/17.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/3.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault5" value=""></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="images/items/18.jpg"
                                                    alt="" width="60" class="me-3 rounded">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Cutes Cube Cool</h6>
                                                    <p class="mb-0">John Abraham</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0.0025 ETH</td>
                                        <td> 0.0025 ETH</td>
                                        <td><img src="images/avatar/4.jpg" alt="" width="40"
                                                class="me-2 rounded-circle">0.0025 ETH</td>
                                        <td>2 Hours 1 min 30s</td>
                                        <td><span><i class="ri-close-line me-3"></i></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




               

            </div>
        </div>
    </div>


    
</div>



<?php include('includes/footer.php');
?>
