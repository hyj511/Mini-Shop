<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>mini shop</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/home.css');?>" rel="stylesheet">
</head>
<body>
    <!-- Page Header-->
    <div class="jumbotron text-center">
        <h3>Mini - Shop</h3> 
        <i class="fa fa-sign-out" aria-hidden="true" id="logout"><a href="<?php echo base_url('index.php/login/logout');?>">Logout</a></i>
    </div>
    <!-- End Page Header-->

    <!-- Page Container-->
    <div class="container">
        <!-- Tab Bar-->
        <ul class="nav nav-tabs">
            <li class="active" id="tab_home"><a data-toggle="tab" href="#home">Home</a></li>
            <li id="tab_shop"><a data-toggle="tab" href="#menu_shop">shop</a></li>
            <li id="tab_product"><a data-toggle="tab" href="#menu_product">product</a></li>
            <li id="tab_order"><a data-toggle="tab" href="#menu_order">order</a></li>
        </ul>
        <!-- End Tab Bar-->

        <!-- Tab Bar Content-->
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <?php include('admin.php');?>
            </div>
            <div id="menu_shop" class="tab-pane fade">            
                <?php include('shop.php');?>
            </div>
            <div id="menu_product" class="tab-pane fade">
                <?php include('product.php');?>
            </div>  
            <div id="menu_order" class="tab-pane fade">
                <p>This is order page</p>
            </div>            
        </div>
        <!-- End Tab Bar Content-->
    </div>
    <!--End Page Container-->

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom Javascript -->
    <script src="<?php echo base_url('assets/js/home.js');?>"></script>
</body>
</html>