<?php
include 'inc/header.php'
?>
<strong><h3 style="text-align: center; margin-top: 20px; color:green" id="ps">Giỏ hàng</h3></strong>
<div class="single-product-area">
<center>
    <div class="zigzag-bottom"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Ảnh bìa</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
										<th class="product-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <div class="coupon col-md-6 text-left">
                                                <label for="coupon_code">Mã giảm giá:</label>
                                                <input type="text" placeholder="Mã giảm giá" value="" id="magiamgia" class="input-text" name="coupon_code">
                                                <input type="button" class="btn btn-success" id="giamgiasp" onclick="apply_redure(magiamgia.value)" value="Áp dụng giảm giá" name="apply_coupon" class="button">
                                            </div>
											<div class="col-md-6 text-right">
                                            <input type="button" value="Cập nhật" name="update_cart" class="btn btn-success" id="updatesp">
                                            <a href="?controller=checkout" type="button" class="btn btn-info" name="proceed" class="checkout-button button alt wc-forward" id="thanhtoansp">
                                                Thanh toán
                                            </a>
											</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Tổng giỏ hàng</h2>
                                <div style="color:red" id="tbgiamgia">
                                </div>
                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng tạm</th>
                                            <td>
                                                <span class="cart-amunt">0 VND</span>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Vận chuyển và xử lí</th>
                                            <td></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng hóa đơn</th>
                                            <td><strong><span id="tonghoadon">0<sup>đ</sup></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
</div>


<?php
include 'inc/footer.php'
?>