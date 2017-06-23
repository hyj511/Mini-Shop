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
            <form class="register-form">
                <input type="text" placeholder="name" id="admin_name">
                <input type="password" placeholder="password" id="admin_pwd">
                <input type="email" placeholder="email address" id="admin_email">
                <button id="regAdmin">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form">
                <input type="text" placeholder="username" id="login_name">
                <input type="password" placeholder="password" id="login_pwd">
                <button id="login">login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
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