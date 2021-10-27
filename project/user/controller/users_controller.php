<?php
 include_once("model/users.php");
 class users_controller{
	 function themphanhoi($hoten, $email,$noidung){
			$m_user = new User();
			$phanhoi = $m_user->themphanhoi($hoten, $email,$noidung);
			$_SESSION['respone_msg'] = "Đã đặt hàng thành công !";
	}
 }
 ?>
