<?php	
		include_once ("model/db.php");
		
		class Order extends Database
		{
			public function LoadOrder($id){
				$query="SELECT *FROM order WHERE id='$id' ";
				$result=$this->select($query);
				return $result;
			}
			public function SaveOrder($dataO){

 // cái này insert vào transaction trước

			$qty =2;
			$amount =333000;
			$data = 'tạm thời' ;
			$status = 0 ;
			// tạm thời luôn lưu tran _id = 1
			$transaction_id = 1;
			$product_id =1;
			
			$query="INSERT INTO order( transaction_id, qty,product_id amount, data, status) VALUES ('$transaction_id','$qty','$product_id','$amount','$data','$status')";
				$result=$this->insert($query);
						if($result){
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Thêm thành công!!!!!")';
									echo '});';
									echo '</script>';
								}
								else{
									echo $result;
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Thêm không thành công!!!!!!!!!!")';
									echo '});';
									echo '</script>';
								}	

					}

		}
?>