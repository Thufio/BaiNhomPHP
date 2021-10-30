<?php
    include_once "lib/session.php";
    include_once 'model/admin.php';
    include_once 'model/db.php';
    include_once 'model/order.php';
    $db=new Database();
    $order=new Order;
    Session::init();
?>
<!DOCTYPE html>
<html>
<head>
  <title>CẬP NHẬT ĐƠN HÀNG</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>
<body>
<button class="btn"><a href="?controller=oder">Trở lại</a></button>
<div class="container"> 
 <h1 class="text-center">CẬP NHẬT ĐƠN HÀNG</h1> 
 <div class="row"> 
  <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
   <form action="" method="post" class="form" role="form"> 
    
    <?php 
        if(isset($update)) echo $update;
     ?>
      <?php

        if(isset($result)){
          while($row=$result->fetch_assoc()){
     ?>  
     
      <br>
      <input class="form-control" title="Tên sản phẩm" value="<?php echo $row['data'] ?>" name="product" placeholder="Tên sản phẩm" type="text">   
      <br>
      <input class="form-control" title="Số lượng"  value="<?php echo $row['qty'] ?>" name="quantity" placeholder="Số lượng" type="number" min=1>   
      <br>
      <input class="form-control" title="Thành tiền" value="<?php echo $row['amount'] ?>" name="amount" placeholder="Thành tiền" type="text">   
      <br>
     <input class="form-control" title="Trạng thái đơn hàng 0/1" value="<?php echo $row['status'] ?>" name="status" placeholder="Trạng thái đơn hàng 0/1" type="number" max="1" min="0">  
        <p><strong>*</strong>1:Giao hàng thành công</p> 
        <p><strong>*</strong>0:Giao hàng không thành công</p> 
      <br>
   
    <div class="row"> 
     
    </div>
    <br> 
    <br> 
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="upda"> Cập nhật</button> 
   </form> 
   <?php
          }
          } 
    ?>
 </div>
</div>
</body>
</html>