 <div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="header-content">
                    <div class="header-left">
                        <div class="brand-logo"><a class="mini-logo" href="index.html"><img src="images/logoi.png" alt=""
                                    width="40"></a></div>
                        <div class="search">
                            <form action="#"><span><i class="ri-search-line"></i></span><input type="text"
                                    placeholder="Search Here"></form>
                        </div>
                    </div>
                    <div class="header-right">
                        <!-- <div class="theme-switch"><i class="ri-sun-line"></i></div> -->

                     


                    
                        <div class="dropdown profile_log dropdown">
                            <div data-bs-toggle="dropdown">
                                <div class="user icon-menu active"><span><img src="images/avatar/9.jpg" alt=""></span>
                                </div>
                            </div>
                            <div tabindex="-1" class="dropdown-menu dropdown-menu-end">
                                <div class="user-email">
                                    <div class="user">
                                        <span class="thumb">
                                            <img src="images/profile/3.png" alt="">
                                        </span>
                                        <div class="user-info">
                                            <h5><?=getMember($conn,$_SESSION['mid'],'name')?></h5>
                                            <span><?=getMember($conn,$_SESSION['mid'],'email')?></span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="profile.html">
                                    <span><i class="ri-user-line"></i></span>Profile
                                </a>
                               
                                <a class="dropdown-item logout" href="logout.php">
                                    <i class="ri-logout-circle-line"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="sidebar">
    <div class="brand-logo"><a class="full-logo" href="dashboard.html"><img src="images/logo.png" alt="" ></a></div>
    <div class="menu">
        <ul>
            <li>
                <a href="dashboard.php">
                    <span><i class="ri-layout-grid-fill"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="plan.php">
                    <span><i class="ri-briefcase-line"></i></span>
                    <span class="nav-text">Invest Plan</span></a>
            </li>
            <li class="">
                <a href="comm-binary.php">
                    <span><i class="ri-heart-line"></i></span>
                    <span class="nav-text">Binary Commission</span></a>
            </li>
          
          <li class="">
                <a href="comm-direct.php">
                    <span><i class="ri-heart-line"></i></span>
                    <span class="nav-text">Ref. Commission</span></a>
            </li>
            <li class="">
                <a href="wallet.php">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Wallet</span></a>
            </li>

            <li class="">
                <a href="member-direct-downline.php">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Member List</span></a>
            </li>
           
           <li class="">
                <a href="tree-view.php">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">View Generalogy</span></a>
            </li>

           <li class="">
                <a href="epin.php">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Pin View</span></a>
            </li>

            <li class="">
                <a href="payment.php?case=add">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Payment</span></a>
            </li>

            <li class="">
                <a href="referral.php">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Invite Earn</span></a>
            </li>



            <li class="">
                <a href="settings-profile.html">
                    <span><i class="ri-settings-3-line"></i></span>
                    <span class="nav-text">Settings Profile</span></a>
            </li>
            <li class=" logout.php"><a href="logout.php">
                    <span><i class="ri-logout-circle-line"></i></span>
                    <span class="nav-text">Signout</span>
                </a>
            </li>
        </ul>
    </div>
</div>