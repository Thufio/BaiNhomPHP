<?php
    include 'inc/header.php';
  ?>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row" align="center">
                <?php
                   $result=$product->GetAllProduct();
                    if (mysqli_num_rows($result) > 0) {
                        while($row = $result->fetch_assoc()) {
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
                     }

                ?>
<!--Danh sách Sản phẩm-->

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'inc/footer.php'
  ?>
