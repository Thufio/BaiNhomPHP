<?php
    include 'inc/header.php'

?>
<div class="col-md-12">
<div class="text-center search">
    <form action="#" method="GET">
                <input type="hidden" name="view" value="product" />
                <td><input type="text" name="search" placeholder="Nhập nội dung" class="textbox"></td>
                <td><input type="submit" name="Tìm kiếm" id="submit" /></td>
        <input type="hidden" name="controller" value="search" />
    </form>
</div>
<h2 class="col-md-12"> Kết quả tìm kiếm </h2>

<div>
<?php

$link = mysqli_connect("localhost", "root", "", "bookstore");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["search"])){
    // Chuẩn bị một câu lệnh SELECT
    $sql = "SELECT * FROM product WHERE name LIKE ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Liên kết các biến với câu lệnh đã chuẩn bị dưới dạng tham số
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        // Set parameters
		$search=$_REQUEST["search"];
        $param_term ='%'.$_REQUEST["search"] .'%';
        // Cố gắng thực hiện câu lệnh đã chuẩn bị
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            // Kiểm tra số hàng trong tập kết quả
            if(mysqli_num_rows($result) > 0){
                // Tìm nạp các hàng kết quả dưới dạng một mảng kết hợp
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<form class="col-md-3">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <img src="../img/'.$row["image_link"].'" alt="Ảnh sách">
                                </div>
                                <h2><a href="?controller=single&id='.$row["id"].'">'.$row["name"].'</a></h2>
                            </div>
                        </form>';

                }
            } else{
                echo "<p>Không tìm được với từ khoá <b> '$search'</b></p>";
            }
        } else{
            echo "ERROR: Could not able to execute " . mysqli_error($link);
        }
    }
     
    // Đóng câu lệnh
    mysqli_stmt_close($stmt);
}
 
// đóng kết nối
mysqli_close($link);
?>
</div>



