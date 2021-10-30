<?php	
		include_once ("model/db.php");
		class Admin extends Database
		{
			
			//Đăng nhập
			public function Login($data)
			{
				$username=$data["user"];
				$password=$data["password"];
				if($password==""||$username==""){
						$alert="<span style='color:red,font-size:10px;'>*Vui lòng điền đủ thông tin!</span>";
								return $alert;
					}
					else{
						
						$check_login="SELECT *FROM admin WHERE username='$username' AND password='$password' ";
						$result_check_login=$this->select($check_login);
						if($result_check_login){
							$value=$result_check_login->fetch_assoc();
							Session::set('login',true);
							Session::set('admin_id',$value['id']);
							Session::set('admin_name',$value['username']);
							Session::set('name',$value['name']);
							header('Location:index.php');
							
						} 
						else{
							$alert="<span style='color:red;font-size:11px;'>*Mật khẩu hoặc username không hợp lệ!</span>";
								return $alert;
						}
				}
			}

			
		}
?>