
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng Kí</title>
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
    if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['signup'])){ //serve yêu cầu method Post và có biến _POST tồn tại thì thực hiện hàm đăng kí 
        $signup=$user->SignUpUser($_POST);
    }
?>
<body style="background-image: url(../img/login.jpg); background-size: 100%">
  <div class="login-page">
  <div class="form">
    <p class="notice">CHÀO MỪNG QUÝ KHÁCH!</p>
    <!--Xuất ra thông báo nếu có lỗi-->
    <?php
      if(isset($signup)){
        echo  $signup;
      }
    ?>
    <form class="login-form" action="" method="POST">

      <input name="user_name" type="text" placeholder="Tên đăng kí"/>
      <input name="password" type="password" placeholder="Mật khẩu"/>
      <input name="name" type="text" placeholder="Họ tên"/>
      <input name="email" type="email" placeholder="Email"/>
      <input name="phone" type="text" placeholder="Số điện thoại"/>
      <input name="address" type="text" placeholder="Địa chỉ"/>
      <button name="signup" type="submit">Đăng kí</button>
      <p >
        <button name="huy" type="submit"  ><a href="index.php" style="text-decoration: none;color: #fff"> Hủy</a> </button>
      </p>
       <p class="message">Bằng việc đăng kí, bạn đã đồng ý với Website về những <a href="view/legal.php" target="_blank">Điều khoản dịch vụ</a> và <a href="view/privacy.php" target="_blank">Chính sách bảo mật</a> </p>
    </form>
  </div>
</div>


</body>
</html>