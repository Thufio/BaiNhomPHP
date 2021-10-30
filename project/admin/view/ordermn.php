<?php
    include_once "lib/session.php";
    include_once 'model/admin.php';
    include_once 'model/db.php';
    include_once 'model/users.php';
    include_once 'model/products.php';
    include_once 'model/order.php';
    $db=new Database();
    $order=new Order;
?>
<!DOCTYPE html>
<html>
<head>
  <meta content='30' http-equiv='refresh'/> 
  <title>Quản lí đơn hàng</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styleadmin.css">
   <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
  <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>

<body>
<div class="container"> 
 <div class="row"> 
<button class="btn"><a href="?controller=index">Trở lại</a></button>
  <div class="col-md-12"> 
   <div class="panel panel-default panel-table"> 
    <div class="panel-heading"> 
     <div class="row"> 
      <div class="col col-xs-6"> 
       <h3 class="panel-title">Danh sách đơn hàng</h3> 
      </div> 
      <div class="col col-xs-6 text-right"> 
      </div> 
     </div> 
    </div> 
    <div class="panel-body"> 
     <table class="table table-striped table-bordered table-list"> 
      <thead> 
       <tr> 
        <th><em class="fa fa-cog"></em>
        </th> 
        <th class="hidden-xs">ID</th> 
        <th>ID giao dịch</th>
        <th>ID Người nhận</th>
        <th>Tên người nhận</th>
        <th>Số điện thoại</th>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Trạng thái</th>
        <th></th>

       </tr> 
      </thead> 
      <tbody>
      
        <?php
              //Tải thông tin các thành viên
                if($result){
                    while ($row=$result->fetch_assoc()) {
        ?>
                       <!-- onclick="return confirm('Bạn có chắc muốn xóa không?')" -->
                    <td align="center"><a href="index.php?controller=order&action=edit&id=<?php  echo $row['id'];?>" target="_blank" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                      <a class="btn btn-danger" onclick="return confirm('Bạn chắc muốn xóa chứ?')" href="index.php?controller=user&action=delete&id= <?php  echo $row['id'];?>" ><em class="fa fa-trash"></em></a>
                    </td> 
                    <td class="hidden-xs"><?php  echo $row["id"]?></td> 
                    <td><?php  echo $row["transaction"]?></td> 
                    <td><?php  echo $row["user_id"]?></td>
                    <td><?php  echo $row["name"]?></td> 
                    <td><?php  echo $row["phone"]?></td>
                    <td><?php  echo $row["data"]?></td> 
                    <td><?php  echo $row["qty"]?></td>
                    <td><?php  echo number_format($row["amount"])?></td>
                    <td><?php if($row["status"]==1)  echo 'Giao hàng thành công'; elseif($row["status"]==0) echo 'Đang xử lí '; ?></td>
         
                    </tr>   
                    
                    
              <?php
                  }
                  } 
              ?> 
      
      
     </tbody></table> 
    </div> 
   </div> 
  </div> 
 </div>
</div>
</body>
</html>