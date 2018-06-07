<?php
require_once('connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	  <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/0228/5633/files/TimesArrow_FAV_32x32.png?v=1519409942" type="image/png">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- drawer.css -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">-->
    <link rel="stylesheet" href="css/drawer.css">
    <title>Time's Arrow</title>
</head>
 <body class="drawer drawer--right">
    <header>
        <!--        Drawer section-->
        <div class="drawer-section" id="searchArea">
            <nav class="drawer-nav">
                <div class="js-drower-close">
                    <a href="javascript:void(0);" class="icon-fallback-text" id="closeDrawer">
            <i class="fa fa-times fa-lg" aria-hidden="true"></i>
           </a>

                </div>
                <div class="text-center drawer-heading">
                    <h4 class="search-header">
<!--                        Text will be rendered from jquery-->
                    </h4>
                </div>
                <div class="form-area">
<!--                  Contents will be rendered dynamically via jquery-->
               
                </div>
            </nav>
        </div>

          



        <!--        //Drawer section-->
        <div class="container-fluid">
            <section>
            <div id="notification-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <center> SIGN UP FOR OUR NEWSLETTER AND GET 15% OFF YOUR NEXT PURCHASE!</center>
                            <a href="https://www.facebook.com/thetimesarrow/" target="_blank"><i class="fa fa-facebook"></i></a> &nbsp; <a href="https://www.instagram.com/timesarrownyc/" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        </div>
   </header>
<!--   Navbar-->
<section>
            <nav class="navbar navbar-expand-lg bg-light navbar-light color-white">
                <div class="container">
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
                    <a href="index.php" class="navbar-brand"><span class="brand-name">Time's Arrow</span></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-item"><a href="newarrivals.php" class="nav-link">New Arrivals</a></li>
                            <li class="navbar-item dropdown">

                                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="bagsDrop" data-toggle="dropdown">Bags</a>
                                <div class="dropdown-menu" id="bageDropDownMenu">

                                </div>

                            </li>

 
                            <li class="navbar-item lgsearchLink"><a href="preorders.php" class="nav-link">Pre-orders</a></li>
                            
                             <li class="navbar-item d-none d-lg-block"><a href="javascript:void(0);" class="nav-link drawer-toggle" id="search"><span><i class="fa fa-search" aria-hidden="true"></i></span></a></li>
                             
                             <li class="navbar-item d-xs-block d-md-block d-sm-block d-lg-none"><a href="search.php" class="nav-link" id="search"><span><i class="fa fa-search" aria-hidden="true"></i></span></a></li>
                             
                              <?php
                            if(isset($_SESSION['lastName'])){
                                
                                ?>
                                     <li class="nav-item" style="cursor:pointer;">
                                          <div class="dropdown">
                                      <a class="nav-link" data-toggle="dropdown">
                                          <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                      </a>
                                
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="checkout.php">Check out</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                     
                                  </div>
                                </div>
                                     </li> 
                                <?php
                            }
                            else {
                                ?>
                                 <li class="nav-item d-none d-lg-block"><a href="javascript:void(0);" class="nav-link drawer-toggle login-trigger" id="login">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      </a></li>
                       <li class="nav-item d-xs-block d-md-block d-sm-block d-lg-none"><a href="login.php" class="nav-link" id="login">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      </a></li>
                                <?php
                            }
                            ?>

                           
                       <li class="nav-item d-none d-lg-block">
                           <a href="javascript:void(0);" class="nav-link drawer-toggle" id="shoppingcartTrigger">
                           <h4><i class="fa fa-shopping-cart" aria-hidden="true"></i></h4>                  </a>
                       </li>
                          <li class="nav-item d-xs-block d-md-block d-sm-block d-lg-none">
                           <a href="shoppingcart.php" class="nav-link" id="shoppingcartTrigger">
                           <h4><i class="fa fa-shopping-cart" aria-hidden="true"></i></h4>                  </a>
                       </li>
                        </ul>
                       
                    </div>
                </div>
            </nav>

        </section>
<!--<//Navbar>-->