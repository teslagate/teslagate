

<?php
   include('includes/menu.php');

   include('includes/api.php');
 ?>

 <title>MetaInv | Investment and earnings system with NFT!</title>
    <meta name="description" content="Investment and earnings system with NFT">
        <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
   include('includes/menu.php');

 ?>

    <div class="upload-item section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <h4 class="card-title mb-3">Upload Item</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="d-flex align-items-center mb-3"><img
                                                class="me-3 rounded-circle me-0 me-sm-3" src="images/items/1.jpg"
                                                width="55" height="55" alt="">
                                            <div class="media-body">
                                                <h5 class="mb-0">Max file size is 20mb</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input name="photo" type="file" class="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Item Name</label><input name="itemName" type="text"
                                            class="form-control">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Description</label><input name="description"
                                            type="text" class="form-control">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Royalties</label><input name="royalties" type="text"
                                            class="form-control">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Size</label><input name="size" type="text"
                                            class="form-control">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Price</label><input name="price" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary mr-2 w-100">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6">
                    <h4 class="card-title mb-3">Preview</h4>
                    <div class="card items">
                        <div class="card-body">
                            <div class="items-img position-relative"><img src="images/items/5.jpg"
                                    class="img-fluid rounded mb-3" alt=""><img src="images/avatar/5.jpg"
                                    class="creator" width="50" alt=""></div>
                            <h4 class="card-title">Liguid Wave</h4>
                            <p></p>
                            <div class="d-flex justify-content-between">
                                <div class="text-start">
                                    <p class="mb-2">Creator</p>
                                    <h5 class="text-muted">John Abrahmam</h5>
                                </div>
                                <div class="text-end">
                                    <p class="mb-2">Price</p>
                                    <h5 class="text-muted">0.55 ETH</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <?php
 
include 'includes/footer.php';
 
?>
