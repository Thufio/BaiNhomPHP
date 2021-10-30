<?php	
		include_once ("model/db.php");
		class Order extends Database
		{
			public function GetAllOrder(){
				$query="SELECT `transaction`.`id` AS 'transaction',`transaction`.`user_id`,`user`.`id`,`user`.`name`,`user`.`phone`,`order`.`transaction_id`,`order`.`qty`,`order`.`amount`,`order`.`data`,`order`.`status` FROM `transaction`,`order`,`user` WHERE `transaction`.id=`order`.transaction_id AND `transaction`.user_id=`user`.id";
				$result=$this->select($query);
				return $result;
			}
			public function GetById($id){
				$query="SELECT `transaction`.`id` AS 'transaction',`transaction`.`user_id`,`user`.`id`,`user`.`name`,`user`.`phone`,`order`.`transaction_id`,`order`.`qty`,`order`.`amount`,`order`.`data`,`order`.`status` FROM `transaction`,`order`,`user` WHERE `transaction`.id=`order`.transaction_id AND `transaction`.user_id=`user`.id AND `transaction`.user_id='$id'";
				$result=$this->select($query);
				return $result;
			}
			public function UpdateOrder($data,$id)
			{
					$product=$data['product'];
					$quantity=$data['quantity'];
					$amount=$data['amount'];
					$status=$data['status'];
					
					if($product==""||$quantity==""||$amount==""||$status==""){
						$alert="<span class='error'>*Bạn phải điền đầy đủ thông tin nhé!</span>";
								return $alert;
					}
							
					else{
								$query="UPDATE `order` SET `data`='$product',`qty`='$quantity',`status`='$status',`amount`='$amount' WHERE `id`='$id'";

								$result=$this->update($query);
								if($result){
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Cập nhập thành công!")';
									echo '});';
									echo '</script>';
								}
								else{
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Cập nhập không thành công!")';
									echo '});';
									echo '</script>';
								}	
								
					 }
					 			
								
					
			}
			public function DeleteOrder($id)
			{
				$query="DELETE FROM order WHERE id='$id' ";
				$result=$this->delete($query);
				
			}

		}
?>