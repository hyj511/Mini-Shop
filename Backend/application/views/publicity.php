<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>mini shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('assets/lib/bootstrap-3.3.7/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Datetime Picker-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/datetimepicker/build/jquery.datetimepicker.min.css');?>"/ >
    <!-- Font Awesome CSS -->
    <link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/home1.css');?>" rel="stylesheet">   
</head>
<body>
    <div id="wrapper" class="active"> 
        <div class="container-fluid" id="header">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                MENU
                </button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    Mini Shop
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			<!--<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>-->
			<ul class="nav navbar-nav navbar-right">
				<!--<li><a href="http://www.pingpong-labs.com" target="_blank">Visit Site</a></li>-->
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<!--<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>-->
							<li class="divider"></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid --> 
        <!-- Sidebar -->
                <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">&nbsp;&nbsp;&nbsp;Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li id="nav_home"><a href="<?php echo base_url('home/index');?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员管理<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                <li id="nav_shop"><a href="<?php echo base_url('home/showShop');?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;门店管理<span class="sub_icon glyphicon glyphicon-link"></span></a></li>                
                <li id="nav_product"><a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品管理<span class="sub_icon glyphicon glyphicon-link"></span></a>
                    <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1">
                        <li><a href="<?php echo base_url('home/showCategory');?>">&nbsp;&nbsp;&nbsp;分类管理</a></li>
                        <li><a href="<?php echo base_url('home/showProduct');?>">&nbsp;&nbsp;&nbsp;商品列表</a></li>
                    </ul>
		        </li>
                <li id="nav_order"><a href="<?php echo base_url('order/getOrderList');?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单管理<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                <li id="nav_order"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;宣传管理<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                <li id="nav_order"><a href="<?php echo base_url('statistic');?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数据统计<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
            </ul>
        </div>
            
        <!-- Page content -->
        <div id="page-content-wrapper">
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <!--<p class="well lead">Mini Shop</p>-->
                        <div id="page_content">
                            <?php include('publicity_table.php');?>                                       
                        </div>
                        <!--<p class="well lead">An Experiment using the sidebar (<a href="http://animeshmanglik.name">animeshmanglik.name</a>)</p> -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- JQuery -->
    <script src="<?php echo base_url('assets/lib/jquery/jquery.min.js');?>"></script>
    <!-- Bootstrap Javascript -->
    <script src="<?php echo base_url('assets/lib/bootstrap-3.3.7/dist/js/bootstrap.min.js');?>"></script>
    <!-- Datetime Picker-->
    <script src="<?php echo base_url('assets/lib/datetimepicker/build/jquery.datetimepicker.full.min.js');?>"></script>
    <!-- Custom Javascript -->
    <!--<script src="<?php echo base_url('assets/js/home.js');?>"></script>-->
    <script src="<?php echo base_url('assets/js/publicity.js');?>"></script>
</body>
</html>
