<?php
    include 'inc/header.php';

  ?>
     <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
						<li class="active"><a href="?controller=index">Trang chủ</a></li>
                        <li><a href="?controller=shop">Cửa hàng</a></li>
                        <li ><a href="?controller=cart">Giỏ hàng</a></li>
                        <li><a href="?controller=checkout">Thanh toán</a></li>
                        <li><a href="?controller=contact">Liên hệ</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><?php

                                $login_check = session::get("user_login");
                                if ($login_check == false) { } else {
                                    echo ' <a href="?controller=account"><span class="glyphicon glyphicon-user"></span> <b>Xin chào, ' . session::get("user_name") . '</b></a>';
                                }
                                ?>
						</li>
							<?php
                            if (isset($_GET["user_id"])) {
                                echo '<script language="javascript">';
                                echo 'confirm("Bạn muốn đăng xuất?",function(e){';
                                echo       'if(e==true){' . session::destroy() . ';}';
                                echo '});';
                                echo '</script>';
                            }
                            ?>
						<li>
							<?php
                                $login_check = session::get("user_login");
                                if ($login_check == false) {
                                    echo '<a href="?controller=login"><i class="fa fa-user"></i> Đăng nhập</a>';
                                } else {
                                    echo '<a href="?user_id=' . session::get("user_id") . '"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a>';
                                }
                                ?>
						</li>
					</ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
<?php
     include 'inc/slider.php';
  ?>
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm mới nhất</h2>
                        <div class="product-carousel">
                            <!--List Sản phẩm gần đây-->
                            <?php

                                $getpd=$product->GetAllProduct();
                                   if ($getpd) {
                                    while($row = $getpd->fetch_assoc()) {
                                        echo '<div class="single-product">
                                        <div class="product-f-image">
                                       <img src="../img/'.$row["image_link"].'" alt="">
                                       <div class="product-hover">
                                        <a  class="add-to-cart-link" data-p-id="'.$row["id"].'" data-p-name="'.$row["name"].'" data-p-image="'.$row["image_link"].'" data-p-price="'.$row["price2"].'"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        <a href="?controller=single&id='.$row["id"].'" class="view-details-link"><i class="fa fa-link"></i> Xem Chi Tiết</a>
                                       </div>
                                       </div>

                                       <h2><a href="?controller=single&id='.$row["id"].'">'.$row["name"].'</a></h2>

                                      <div class="product-carousel-price">
                                      <ins>'.number_format($row["price2"]).'<sup>đ</sup></ins> <del>'.number_format($row["price1"]).'<sup>đ</sup></del>
                                     </div>
                                     </div>';
                                    }
                                }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->

    
     <!-- End brands area -->

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Bán chạy nhất</h2>
                        <a href="?controller=shop" class="wid-view-more">Xem tất cả</a>
                         <?php

                                    $quan=2;
                                    $getpd=$product->GetXProduct($quan);
                                    if ($getpd) {
                                        $i=0;
                                    while($row = $getpd->fetch_assoc()) {

                                        if($i>$quan-1) break;

                                        echo '<div class="single-wid-product">
                                        <a href="?controller=single&id='.$row["id"].'"><img src="../img/'.$row["image_link"].'" alt="" class="product-thumb"></a>
                                        <h2><a href="?controller=single&id='.$row["id"].'">'.$row["name"].'</a></h2>
                                        <div class="product-wid-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                        <ins>'.number_format($row["price2"]).'<sup>đ</sup></ins> <del>'.number_format($row["price1"]).'<sup>đ</sup></del>
                                        </div>
                                        </div>';
                                         $i++;
                                     }
                                }

                        ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Xem gần đây</h2>
                        <a href="?controller=shop" class="wid-view-more">Xem tất cả</a>
                        <?php

                                    $quan=2;
                                    $getpd=$product->GetXProduct($quan);
                                    if ( $getpd) {
                                        $i=0;
                                    while($row = $getpd->fetch_assoc()) {

                                        if($i>$quan-1) break;

                                        echo '<div class="single-wid-product">
                                        <a href="?controller=single&id='.$row["id"].'"><img src="../img/'.$row["image_link"].'" alt="" class="product-thumb"></a>
                                        <h2><a href="?controller=single&id='.$row["id"].'">'.$row["name"].'</a></h2>
                                        <div class="product-wid-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                        <ins>'.number_format($row["price2"]).'<sup>đ</sup></ins> <del>'.number_format($row["price1"]).'<sup>đ</sup></del>
                                        </div>
                                        </div>';
                                         $i++;
                                     }
                                }


                        ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Sản phẩm mới</h2>
                        <a href="?controller=shop" class="wid-view-more">Xem tất cả</a>
                        <?php

                                   $quan=2;
                                    $getpd=$product->GetXProduct($quan);
                                    if ( $getpd) {
                                        $i=0;
                                    while($row = $getpd->fetch_assoc()) {

                                        if($i>$quan-1) break;

                                        echo '<div class="single-wid-product">
                                        <a href="?controller=single&id='.$row["id"].'"><img src="../img/'.$row["image_link"].'" alt="" class="product-thumb"></a>
                                        <h2><a href="?controller=single&id='.$row["id"].'">'.$row["name"].'</a></h2>
                                        <div class="product-wid-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                        <ins>'.number_format($row["price2"]).'<sup>đ</sup></ins> <del>'.number_format($row["price1"]).'<sup>đ</sup></del>
                                        </div>
                                        </div>';
                                         $i++;
                                     }
                                }



                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

  <?php
        include 'inc/footer.php'
    ?>
