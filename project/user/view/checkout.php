<?php
    include 'inc/header.php';
	//Kiểm tra phiên đăng nhập
	$login_check=session::get("user_login");
        if(!$login_check){
        header('Location:?controller=login');
        }
?>
<?php
    include_once ("controller/Xac_Nhan.php");
    $user=new User();
    if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['xacnhan'])){
        $xacnhan=$order->SaveOrder($_POST);
    }
?>
<strong><h3 style="text-align: center; margin-top: 20px; color:green" id="ps">THANH TOÁN ĐƠN HÀNG</h3></strong>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-left: 50px">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form  action="" class="checkout" method="POST" name="xn">

                                <div id="customer_details">
                                        <div class="woocommerce-billing-fields">
                                            <h3 class="text-center">Chi tiết hóa đơn</h3>
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Họ và tên người nhận: <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Địa chỉ người nhận: <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value=""  id="billing_address_1" name="address" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email: <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_email" class="input-text ">
                                            </p>
                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Số điện thoại: <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_phone" name="phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                    </div>
                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Tổng tạm</th>
                                                <td>
                                                    <span class="cart-amunt">110.000 VND</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Vận chuyển và xử lí</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping"  id="shipping_method_0" data-index="0">
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Tổng hóa đơn</th>
                                                <td><strong><span id="tonghoadon">0<sup>đ</sup></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                          <input type="number" value=0  hidden=true placeholder="" id="amount" name="amount" class="input-text " />
                                             <input type="number" hidden=true value="" placeholder="" id="qty" name="qty" class="input-text " />

                                    <div id="pay	ment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Thanh toán trực tiếp khi nhận hàng </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Thanh toán trực tiếp cho shipper khi bạn nhận được hàng</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="text-center form-row place-order">
                                            <input name="xacnhan" type="submit" class=" btn btn-info" data-value="Place order" value="Đặt hàng" id="place_order" class="button alt">
                                        </div>
										</br>
                                        <div class="clear">
										</div>
                                    </div>
                                </div>
                            </form>
                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
  <?php
    include 'inc/footer.php'
  ?>