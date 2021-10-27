<?php	
		include_once ("model/db.php");
		
		class User extends Database
		{
			public function LoadInform($id){
				$query="SELECT *FROM user WHERE id='$id' ";
				$result=$this->select($query);
				return $result;
			}
			public function SignUpUser($data)
			{
					$user_name=$data['user_name'];
					$name=$data['name'];
					$password=$data['password'];
					$email=$data['email'];
					$phone=$data['phone'];
					$address=$data['address'];

					//Kiểm tra thông tin đã được điền
					if($user_name==""||$name==""||$password==""||$phone==""||$email==""||$address==""){
						echo '<script language="javascript">';
                      	echo 'document.addEventListener("DOMContentLoaded",function(){';
                       	echo ' alertify.alert("Vui lòng điền đủ thông tin!")';
						echo '});';
						echo '</script>';
					}
					//Kiểm tra tài khoản đăng kí
					else{
						//Kiểm tra số điện thoại
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
								$alert="<span class='error'>*Email đã được sử dụng!</span>";
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
                       				echo ' alertify.alert("Thêm thành công,vui lòng đăng nhập lại!")';

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
			public function LogInUser($data)
			{
				$email_name=$data["email_name"];
				$password=$data["password"];
				if($password==""||$email_name==""){
						echo '<script language="javascript">';
                       	echo 'document.addEventListener("DOMContentLoaded", function() {';
                       	echo ' alertify.alert("Bạn phải điền đầy đủ thông tin nhé!")';
						echo '});';
						echo '</script>';
					}
					//Kiểm tra tài khoản 
					else{
						
						$check_login="SELECT *FROM user WHERE (email='$email_name' OR user_name='$email_name') AND password='$password' ";
						$result_check_login=$this->select($check_login);
						if($result_check_login){
							$value=$result_check_login->fetch_assoc();
							Session::set('user_login',true);
							Session::set('user_id',$value['id']);
							Session::set('user_name',$value['user_name']);
							Session::set('fullname',$value['name']);
							header('Location:index.php');
							
						} 
						else{
							$alert="<span class='error'>*Mật khẩu hoặc username/email không hợp lệ!</span>";
								return $alert;
						}
				}
			}
			public function UpdataUser($data,$id)
			{
					$name=$data['fullname'];
					//$newpassword=$data['newpasswd'];
					//$oldpassword=$data['oldpasswd'];
					//$re_newpassword=$data['re-newpasswd'];
					$email=$data['email'];
					$phone=$data['phone'];
					$address=$data['address'];
					if($name==""||$phone==""||$email==""||$address==""){
						echo '<script language="javascript">';
                       	echo 'document.addEventListener("DOMContentLoaded", function() {';
                       	echo ' alertify.alert("Bạn phải điền đầy đủ thông tin nhé!")';
						echo '});';
						echo '</script>';
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
								
					 }
					
			}
			public function DeleteUser($data)
			{
			
			}


			//phan hoi  tai user
			function themphanhoi($hoten,$email,$noidung){
				$sql = "INSERT INTO phanhois(hoten, email,noidung) VALUES( '$hoten','$email','$noidung')";
				$result=$this->execute($sql);
				return $result;
			}

		}
?>