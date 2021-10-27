<?php
include_once "lib/session.php";
include_once 'model/banner.php';
include_once 'model/db.php';
include_once 'model/users.php';
include_once 'model/products.php';
include_once 'model/order.php';
include_once "lib/format.php";
Session::init();
$db = new Database();
$user = new User;
$product = new Product;
$format = new Format;
$order = new Order;
$banner = new Banner;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nhà Sách Hải Quân</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
    <script type="text/javascript" src="public/script/script.js"></script>
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">


    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">
</head>

<body>

    <div class="header-area" style="background:#F8E0EC">
        <div class="container">
            <div class="row">


                <!--  Phần của banner -->
                <!-- 
                <?php
                $result = $banner->show();
                if ($result) {
                    while ($row = $result->fetch_assoc()) {

                        ?>
                
                <font style="font-family: Calibri; font-size: 30px"><marquee direction="left" style="background: <?php echo $row['bgcolor'] ?>; height: 50px; color: <?php echo $row['color'] ?>"><b>WWW.BOOKSTORE.COM</b> - " <?php echo $row['content'] ?>"</marquee></font>
                <?php
                    }
                }
                ?>
                  -->
                </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="../img/logo.png"></a></h1>
                    </div>
                </div>
                <div class="col-sm-6 bottom-right">
                    <div class="shopping-item">
                        <a href="?controller=cart">Giỏ Hàng<i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="shopping-item-2" style="position: fixed;padding: 10px;border: 1px solid black;border-radius: 5px;right: 10px;z-index: 1000;bottom: 10px;background-color: white;cursor: pointer;display: none;" onclick="window.location.href='?controller=cart'">
        <i class="fa fa-shopping-cart" style="font-size: 30px;"></i>
        <span class="product-count">5</span>
    </div>