<?php
    include 'inc/header.php'
  ?>
<strong><h3 style="text-align: center; margin-top: 20px; color:green">Chi tiết sản phẩm</h3></strong>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
    <!--Chi tiết sản phẩm-->
                <?php
                    if(isset($_GET['id'])){
                        $name=$_GET['id'];
                        $getbook=$product->GetDetailProduct($name);
                        if ($getbook) {
                            while($row = $getbook->fetch_assoc()) {


                ?>


                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="?controller=">Trang chủ</a>
                            <a href="#">Chi tiết sản phẩm</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <?php echo '<img src="../img/'.$row["image_link"].'" alt=""/>'   ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h3 class="product-name"><?php echo $row["name"]  ?></h3>
                                    <div>
                                    	<b>Tác giả:</b><span><?php echo $row["author"]  ?></span><br>
                                        <b>Thể loại:</b><span><?php echo $row["id_category"]  ?></span><br>
										<b>Số lượng:</b><span><?php echo $row["quantity"]  ?></span><br>
										<b>Số lượt xem:</b><span><?php echo $row["view"]; ?></span>
                                    </div>
                                    <hr width="360px" height="8px" style="margin: 5px; margin-bottom: 20px"   />
                                    <div class="product-inner-price">
                                        <span><big>Giá bán: <?php echo number_format($row["price2"])  ?><sup>đ</sup></big>   <del><small>Giá gốc: <?php echo number_format($row["price1"])  ?><sup>đ</sup></small></del></span>
                                    </div>

                                    <form action="single-product.php" class="cart">
                                        <button class="add_to_cart_button"  type="button" <?php echo 'data-p-id="'.$row["id"].'" data-p-name="'.$row["name"].'" data-p-image="'.$row["image_link"].'" data-p-price="'.$row["price2"].'"' ?> >Thêm vào giỏ hàng</button>
                                    </form>

                                    <div class="product-inner-category">

                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô tả sản phẩm</h2>
                                                <p>
                                                    <?php echo $row["content"]  ?>
                                                </p>
                                            </div>
                                            <?php
                                                        }
                                                    }
                                                }

                                            ?>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Nhận xét</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Tên</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Đánh giá</p>
                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Nhận xét</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Gửi"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>
<?php
    include 'inc/footer.php'
?>
