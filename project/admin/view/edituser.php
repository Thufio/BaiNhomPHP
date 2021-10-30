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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin thành viên</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
  <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>

<body>
<div class="container">
<button class="btn"><a href="?controller=user">Trở lại</a></button>
 <h1 class="text-center">CẬP NHẬT THÔNG TIN KHÁCH HÀNG </h1> 
 <div class="row"> 
  <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
   <form action="" method="post" class="form" role="form"> 
    <?php 

        if(isset( $update)) echo  $update;
     ?>
     <?php 
            if($result){
                            while($row=$result->fetch_assoc()){
     ?>
     <br>
   		<input class="form-control" name="name" value="<?php echo $row['name'] ?>" placeholder="Họ tên" required="" autofocus="" type="text">
   		<br>
   		<input class="form-control" name="email" value="<?php echo $row['email'] ?>" placeholder="Email" type="email">
   		<br>
   		<input class="form-control" name="address" value="<?php echo $row['address'] ?>" placeholder="Địa chỉ" type="text">   
   		<br>
      <input class="form-control" name="phone" value="<?php echo $row['phone'] ?>" placeholder="Số điện thoại" type="text">   
      <br>
    
    <br> 
    <br> 
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="update"> Cập nhật</button>
   </form> 
   <?php
       }
     } 
    ?>
 </div>
</div>
</body>
</html>