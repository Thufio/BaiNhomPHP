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
    include_once ("model/users.php"); //Khai báo thư viện lớp users
    $user=new User();//tạo ra 1 đối tượng user
    if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['login'])){ //serve yêu cầu method Post và có biến _POST tồn tại thì thực hiện hàm đăng kí 
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
      <input name="email_name" type="text" placeholder="Username hoặc email"/>
      <input name="password" type="password" placeholder="Mật khẩu"/>
      <button name="login" type="submit">Đăng nhập</button>
      <p>
        <button name="huy" type="submit"><a href="index.php" style="text-decoration: none;color: #fff"> Quay lại</a></button>
        
      </p>
      <p class="message">Nếu bạn chưa đăng có tài khoản? <a href="?controller=signup">Tạo tài khoản</a></p>
    </form>
  </div>
</div>


</body>
</html>