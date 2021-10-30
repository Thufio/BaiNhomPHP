<?php     
		include 'inc/header.php' ;
        //Kiểm tra phiên đăng nhập
		$login_check=session::get("user_login");
                if(!$login_check){
                    header('Location:index.php');
                }
 ?>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-sidebar">

                    <?php
                        $id=session::get("user_id");

                        $result=$user->LoadInform($id);
                        if($result){
                            while($row=$result->fetch_assoc()){
                    ?>
                     <img src="<?php  echo $row["avatar"]?>" alt='Avatar'/>
                    </div> 
                    
                </div>
                <?php
                        $id=session::get("user_id");
                        
                        if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['update'])){
                            $update_user=$user->UpdataUser($_POST,$id);
                        }
                        
                 ?>
                <div class="col-md-9">
                    <div class="woocommerce">
                        <form action="#" class="edit-profile" method="post" name="edit-profile">
                                <div id="customer_details" class="col-md-7"  >
                                        <div class="woocommerce-billing-fields">
                                            <h3>Thông tin chi tiết</h3>
                                            <p >
                                                <?php 
                                                if(isset($update_user)){
                                                    echo $update_user;
                                                }
                                            ?>
                                            </p>
                                            <div class="clear"></div>
                                            <p >
                                                <label class="" for="fullname">Họ Tên:</label>
                                                <input type="text" value="<?php echo $row["name"]  ?>" placeholder=""  name="fullname" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                            <p>
                                                <label class="" for="address">Địa chỉ: </label>
                                                <input type="text" value="<?php echo $row["address"]  ?>" placeholder=""  name="address" class="input-text ">
                                            </p>
                                            <p>
                                                <label class="" for="email">Email:</label>
                                                <input type="text" value="<?php echo $row["email"]  ?>" placeholder=""  name="email" class="input-text ">
                                            </p>
                                                <div class="clear"></div>
                                            <p>
                                                <label class="" for="phone">Số điện thoại: </label>
                                                <input type="text" value="<?php echo $row["phone"]  ?>" placeholder="" name="phone" class="input-text ">
                                            </p>
											<p>
                                                <label class="" for="avatar">Link ảnh: </label>
                                                <input type="text" value="<?php echo $row["avatar"]  ?>" placeholder="" name="avatar" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                            <label>
                                                <input type="checkbox" name="changepass" id="input-changepass" value="">
                                                <span for="changepass">Đổi mật khẩu</span>
                                            </label>
                                              <?php
                                                    }
                                                    } 
                                               ?>  
                                           
                                             <div class="clear"></div>
                                              <div id="passwordgroup" style="display: block;">
                                                  <div>
                                                     <p>
                                                        <label  for="oldpasswd">Mật khẩu cũ</label>
                                                        <input type="password" value="<?php echo $row["password"]  ?>"  name="oldpasswd" class="input-text ">
                                                    </p>
                                                    <div class="clear"></div>
                                                    <p>
                                                        <label class="" for="newpasswd">Mật khẩu mới</label>
                                                        <input type="password" value=""  name="newpasswd" class="input-text ">
                                                    </p>
                                                    <div class="clear"></div>
                                                    <p>
                                                        <label class="" for="re-newpasswd">Nhập lại</label>
                                                        <input type="password" value="" name="re-newpasswd" class="input-text ">
                                                    </p>
                                                  </div>
                                             
                                              </div>
                                            <?php
											echo '<script type="text/javascript">
													document.getElementById("input-changepass").onclick=function(e){
													if(this.checked==true){
													document.getElementById("passwordgroup").style.display=block;
													}
													}
												</script>';
                                             ?>
                                               <div class="clear"></div>
                                               <div class="">

                                                    <input type="submit" class=" btn btn-info" value="Cập nhập"  name="update" class="button alt">
                                                </div>
                                        </div>
                                </div>
                            </form>
                        </div>   
                </div>
            </div>
        </div>
</div>
 <?php
 		include 'inc/footer.php' 
  ?>