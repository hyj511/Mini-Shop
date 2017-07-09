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
    <link href="<?php echo base_url('assets/css/login.css');?>" rel="stylesheet">
</head>
<body>
    <div class="login-page">
        <div class="text-center">
            <h3 style="color: white;"><strong>Mini Shop</strong></h3>
        </div>
        <div class="form">
            <form class="login-form" action="<?php echo base_url('login/forgot_accept');?>" method="POST">
                <input type="text" placeholder="name" id="forgot_name" name="forgot_name">
                <input type="email" placeholder="your email" id="forgot_email" name="forgot_email">
                <button type="submit" id="forgot_btn">submit</button>                
            </form>           
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom Javascript -->
    <script src="<?php echo base_url('assets/js/login.js');?>"></script>
</body>
</html>