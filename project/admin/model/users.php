<?php	
		include_once ("model/db.php");
		class User extends Database
		{
			public function LoadInform(){
				$query="SELECT *FROM user ";
				$result=$this->select($query);
				return $result;
			}
			public function LoadById($id){
				$query="SELECT *FROM user WHERE id='$id' ";
				$result=$this->select($query);
				return $result;
			}
			public function AddUser($data)
			{
					$user_name=$data['username'];
					$name=$data['name'];
					$password=$data['password'];
					$email=$data['email'];
					$phone=$data['phone'];
					$address=$data['address'];

					//Kiểm tra thông tin đã được điền đầy đủ không 
					if($user_name==""||$name==""||$password==""||$phone==""||$email==""||$address==""){
						$alert="<span class='error'>*Bạn phải điền đầy đủ thông tin nhé!</span>";
								return $alert;
					}
					//Kiểm tra tài khoản đăng kí
					else{
						//Kiểm tra số điện thoại 10 và theo đầu số các nhà mạng
						if(!preg_match("/^((09|03|07|08|05)+([0-9]{8}))$/",$phone)) {
            				return $alert="<span class='error'>*Số điện thoại không hợp lệ</span>";
        				}
        				//Kiểm tra email theo hàm có sẵn(phải chứa dấu @)
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                          	return $alert="<span class='error'>*Email nhập chưa đúng.</span>";
                        }
                        //Kiểm tra username và email không được trùng
						$check_email="SELECT *FROM user WHERE email='$email'  LIMIT 1";
						$check_user_name="SELECT *FROM user WHERE user_name='$user_name'  LIMIT 1";
						$result_check_email=$this->select($check_email);
						$result_check_user_name=$this->select($check_user_name);
						if($result_check_email||$result_check_user_name){

							if($result_check_email)
							{
								$alert="<span class='error' style='text-align:center;'>*Email đã được sử dụng!</span>";
								return $alert;

							}
							if($check_user_name)
							{
								$alert="<span class='error'>*Username đã được sử dụng!</span>";
								return $alert;
							}
							
						} 
						//Sau khi kiểm tra, chèn thông tin user mới vào CSDL
						else{
							$query="INSERT INTO user( name, user_name, email, phone, address, password) VALUES ('$name','$user_name','$email','$phone','$address','$password')";
							$result=$this->insert($query);
							if($result){
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Thêm thành công!")';
									echo '});';
									echo '</script>';
								}
								else{
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Thêm không thành công!")';
									echo '});';
									echo '</script>';
								}	
						}
					}
			}
			//Cập nhập thành viên
			public function UpdateUser($data,$id)
			{
					$name=$data['name'];
					$email=$data['email'];
					$phone=$data['phone'];
					$address=$data['address'];
					if($id==""||$name==""||$phone==""||$email==""||$address==""){
						$alert="<span class='error'>*Bạn phải điền đầy đủ thông tin nhé!</span>";
								return $alert;
					}
					
					// $check_pass="SELECT *FROM user WHERE id='$id' AND password='$oldpassword'";
					// $result_check_pass=$this->select($check_pass);
					$check_email="SELECT *FROM user WHERE email='$email' AND id<>$id LIMIT 1";
					$result_check_email=$this->select($check_email);

					if($result_check_email){
						if($result_check_email)
						{
								$alert="<span class='error'>*Email đã được sử dụng!</span>";
								return $alert;

						}
						// if(!$result_check_pass)
						// {
						// 		$alert="<span class='error'>*Nhập sai mật khẩu cũ!</span>";
						// 		return $alert;

						// }
						
					}
							
					else{
								$query="UPDATE user SET name='$name',email='$email',phone='$phone',address='$address'WHERE id='$id'";
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
			public function DeleteUser($id)
			{
				$query="DELETE FROM user WHERE id='$id' ";
				$result=$this->delete($query);
				
			}
		}
?>