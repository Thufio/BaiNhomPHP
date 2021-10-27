<?php
    include 'inc/header.php'

  ?>
  <div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="?controller=index">Trang chủ</a></li>
                    <li><a href="?controller=shop">Cửa hàng</a></li>

                    <li class="active"><a href="?controller=cart">Giỏ hàng</a></li>
                    <li><a href="?controller=checkout">Thanh toán</a></li>
                    <li><a href="?controller=contact">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <br />
  <h2 style="color: #FF8000;margin-left: 20px;"> Kết quả tìm kiếm </h2>


<?php

$link = mysqli_connect("localhost", "root", "", "bookstore");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["tukhoa"])){
    // Prepare a select statement
    $sql = "SELECT * FROM product WHERE name LIKE ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["tukhoa"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    //echo "<p>" . $row["name"] . "</p>";

                    


                    echo '<div class="col-md-3 col-sm-6">
                                        <div class="single-shop-product">
                                        <div class="product-upper">
                                         <img src="../img/'.$row["image_link"].'" alt="Ảnh sách">
                                        </div>
                                        <h2><a href="?controller=single&id='.$row["id"].'">'.$row["name"].'</a></h2>
                                        <div class="product-carousel-price">
                                         <ins>'.number_format($row["price2"]).'<sup>đ</sup></ins> <del>'.number_format($row["price1"]).'<sup>đ</sup></del>
                                        </div>

                                        <div class="product-option-shop">
                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" data-p-id="'.$row["id"].'" data-p-name="'.$row["name"].'" data-p-image="'.$row["image_link"].'" data-p-price="'.$row["price2"].'">Thêm giỏ hàng</a>
                                        </div>
                                        </div>
                                        </div>';

                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($link);
?>
<?php

	include 'inc/footer.php'
    
?>



