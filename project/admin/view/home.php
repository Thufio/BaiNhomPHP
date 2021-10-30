<?php
    include_once "lib/session.php";
    include_once 'model/admin.php';
    include_once 'model/db.php';
    include_once 'model/users.php';
    include_once 'model/products.php';
    Session::init();
   
    $db=new Database();
    $admin=new Admin;
    $user=new User;
    $product=new Product;
?>
<!DOCTYPE html>
<html>
<head>
  <!--Check phiên đăng nhập-->
  <?php
    $check_login=session::get("login");
    if ($check_login==false) {
     
     header("Location:login.php");
    } 
   ?>
   <?php
    if (isset($_GET["action"])&&$_GET["action"]=="logout") {
      Session_destroy();
     header("Location:login.php");
    } 
   ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nhà Sách Hải Quân</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="public/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="public/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"></span>
      <span class="logo-lg"><b>Trang quản trị</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Nhà Sách</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
              <a href="?action=logout" >Đăng xuất</a>
           </li>
         </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="public/dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo session::get("name") ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Đang hoạt động</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">Chức năng</li>
        <li><a href="?controller=product"><i class="fa fa-link"></i> <span>Quản lý sản phẩm</span></a></li>
        <li><a href="?controller=user" ><i class="fa fa-link"></i> <span>Quản lý khách hàng</span></a></li>
        <li><a href="?controller=order" ><i class="fa fa-link"></i> <span>Quản lý đơn hàng</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper" >
    <section class="content container-fluid" >
        <h1 style="margin: 0 auto; text-align: center; font-size: 60px; ">WELLCOME</h1>
        <h3 style="text-align: center">Chào mừng <?php echo session::get("name") ?> đến với trang quản lý Website Nhà Sách Hải Quân</h3>   
    </section>
<script src="public/bower_components/jquery/dist/jquery.min.js"></script>
<script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="public/dist/js/adminlte.min.js"></script>
</body>
</html>