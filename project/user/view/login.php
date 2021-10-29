<?php
    include_once "lib/session.php";
    Session::init();
    $login_check=session::get("user_login");
    if($login_check){
    header('Location:index.php');
    }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
  <script type="text/javascript" src="public/script/script.js"></script>
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
  <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
</head>
<?php
    include_once ("model/users.php");
    $user=new User();
    if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['login'])){
        $login=$user->LogInUser($_POST);
    }
?>
<body style="background-image: url(../img/blg.jpg); background-size: 100%">
  <div class="login-page">
  <div class="form">
   
    <?php
      if(isset($login)){
        echo  $login;
      }
    ?>
    <form class="login-form" action="" method="POST">
	<b>Tên Đăng Nhập:</b>
      <input name="email_name" type="text" placeholder="Username hoặc email"/>
	<b>Mật khẩu:</b>
      <input name="password" type="password" placeholder="Mật khẩu"/>
      <button name="login" type="submit">Đăng nhập</button>
      <p>
        <button name="huy" type="submit"><a href="index.php" style="text-decoration: none;color: #fff"> Quay lại</a></button>
        
      </p>
      <h2 class="message dark">Nếu bạn chưa đăng có tài khoản? <a href="?controller=signup">Tạo tài khoản</a></h2>
    </form>
  </div>
</div>


</body>
</html>