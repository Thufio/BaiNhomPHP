
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script> 
  <script type="text/javascript" src="public/alertify/src/alertify.js"></script>
 <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="public/alertify/themes/alertify.default.css">
</head>
<body>
<div class="container"> 
 <h1 class="text-center">THÊM SẢN PHẨM</h1> 
 <div class="row"> 
  <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
   <form action="" method="post" class="form" role="form" enctype="multipart/form-data"> 
        <?php 
            if(isset($add)) echo $add;
        ?>
	<td>Tên sách:</td>
   	<input class="form-control" name="name" placeholder="Tên sản phẩm"  type="text">
	<td>Tên tác giả:</td>
    <input class="form-control" name="author" placeholder="Tác giả" type="text">
	<td>Giá tiền gốc:</td>
    <input class="form-control" name="price1" placeholder="Giá gốc" type="number">
	<td>Giá tiền giảm:</td>
    <input class="form-control" name="price2" placeholder="Giá bán" type="number">
    <td>Loại sách:</td>
		<td><select class="form-control" name="category">
			<?php
				$dbc = @mysqli_connect ('localhost','root','','bookstore');
				mysqli_set_charset($dbc, 'utf8');
				$query="select * from typebook";
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$id_category=$row['id_category'];
						$name_category=$row['name_category'];
						echo "<option value='$id_category' "; 
								if(isset($_REQUEST['category']) && ($_REQUEST['category']==$id_category)) echo "selected='selected'";
						echo ">$name_category</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	<td>Mô tả:</td>
    <textarea class="form-control" name="content" placeholder="Mô tả..."></textarea>  
	<td>Avatar:</td>
    <input class="form-control" name="image" placeholder="Hình ảnh" type="file">
	<br>
    <p><strong>Lưu ý:</strong>Kích thước file ảnh(định dạng jpg, jpeg, png, gif) tối đa 2MB.</p>
	<td>Số lượng:</td>
    <input class="form-control" name="quantity" placeholder="Số lượng" value="<?php echo $row['quantity'] ?>" type="number" min="1">
    <div class="row"> 
    </div>
	<br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="add"> Thêm</button>
	<button class="btn btn-lg btn-danger btn-block"><a href="?controller=product">Trở lại</a></button>
   </form> 
 </div>
</div>
</body>
</html>