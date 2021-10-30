<?php
    include_once "lib/session.php";
    include_once 'model/db.php';
    include_once 'model/admin.php';
    Session::init();
    $db=new Database();
    $admin=new Admin;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Nhà Sách Hải Quân</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="css/stylelogin.css">
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>
<body style="background:url(public/dist/img/bg.png) center center">
    
    <?php
            
                        if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['login'])){
                            $login=$admin->Login($_POST);
                        }
                  
     ?>
		<div class="container">
			<div class="login-container">
            <div id="output"></div>
            <div  class="avatar" style="background:url(public/dist/img/admin.png) center center" ></div>
            <div class="form-box">
                <?php 
                    if(isset($login)) echo $login;
                 ?>
                
                <form action="" method="POST">
					<b>Tên đăng nhập:</b>
                    <input name="user" type="text" placeholder="Tên đăng nhập">
					<b>Mật khẩu:</b></br>
                    <input name="password" type="password" placeholder="Mật khẩu">
                    <button class="btn btn-info btn-block login" type="submit" name="login">Đăng nhập</button>
                </form>
            </div>
        </div>        
</div>
</body>
</html>