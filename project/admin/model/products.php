<?php
		include_once 'model/db.php';

		class product extends Database{

			public function GetProductById($id)
			{          
            $query="SELECT * FROM `product` WHERE id='$id' ";
            $get_result=$this->select($query);
            return $get_result;
			}
			public function GetAllProduct()//Lấy tất cả sản phẩm ra 
			{
			$query="SELECT * FROM `product`";
            $get_all=$this->select($query);
            return $get_all;                   
			}
			public function LoadInform(){
				$query="SELECT *FROM product ";
				$result=$this->select($query);
				return $result;
			}
			public function LoadById($id){
				$query="SELECT *FROM product WHERE id='$id' ";
				$result=$this->select($query);
				return $result;
			}
			public function AddProduct($data,$file)
			{
				$name=$data["name"];
				$author=$data["author"];
				$price1=$data["price1"];
				$price2=$data["price2"];
				$category=$data["category"];
				$content=$data["content"];
				$quantity=$data["quantity"];
				
				//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder img
				$permitted=array('jpg','jpeg','png','gif' );
				$file_name=$_FILES['image']['name'];
				$file_size=$_FILES['image']['size'];
				$file_temp=$_FILES['image']['tmp_name'];

				$div=explode('.',$file_name);
				$file_ext=strtolower(end($div))	;
				$unique_image=substr(time(),0,10).'.'.$file_ext;
				$uploaded_image="../img/".$unique_image;

					//Kiểm tra thông tin đã được điền đầy đủ không 
					if($name==""||$author==""||$price1==""||$price2==""||$category==""||$content==""||$file_name==""){
						$alert="<span class='error'>*Bạn phải điền đầy đủ thông tin nhé!</span>";
								return $alert;
					}
					else{
						if($file_size>1024*1024*2){
								$alert="<span class='error'>*Kích thước file lớn giới hạn!</span>";
								return $alert;
						}
						elseif (in_array($file_ext,$permitted)==false) {
							$alert="<span class='error'>*Loại tệp không cho phép!</span>";
								return $alert;
						}
						move_uploaded_file($file_temp,$uploaded_image);
							$query="INSERT INTO product( name, author, price1, price2, category, content, image_link,quantity) VALUES ('$name','$author','$price1','$price2','$category','$content','$unique_image','$quantity')";
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
			public function UpdateProduct($data,$file,$id)
			{
				$name=$data["name"];
				$author=$data["author"];
				$price1=$data["price1"];
				$price2=$data["price2"];
				$category=$data["category"];
				$content=$data["content"];
				$quantity=$data["quantity"];
				
				$permitted=array('jpg','jpeg','png','gif' );
				$file_name=$_FILES['image']['name'];
				$file_size=$_FILES['image']['size'];
				$file_temp=$_FILES['image']['tmp_name'];

				$div=explode('.',$file_name);
				$file_ext=strtolower(end($div))	;
				$unique_image=substr(time(),0,10).'.'.$file_ext;
				$uploaded_image="../img/".$unique_image;	

					//Kiểm tra thông tin đã được điền đầy đủ không 
					if($name==""||$author==""||$price1==""||$price2==""||$category==""||$content==""){
						$alert="<span class='error'>*Bạn phải điền đầy đủ thông tin nhé!</span>";
								return $alert;
					}
					else{
						if(!empty($file_name)){
							if($file_size>1024*1024*2){
								$alert="<span class='error'>*Kích thước file ảnh lớn giới hạn!</span>";
								return $alert;
							}
							elseif (in_array($file_ext,$permitted)==false) {
							$alert="<span class='error'>*Loại tệp không cho phép!</span>";
								return $alert;
							}
							$query="UPDATE product SET 
							name='$name',
							category='$category',
							price1='$price1',
							price2='$price2',
							content='$content',
							author='$author',
							image_link='$unique_image',
							quantity='$quantity'
							 WHERE id='$id'";
						}
						else{
							$query="UPDATE product SET 
							name='$name',
							category='$category',
							price1='$price1',
							price2='$price2',
							content='$content',
							author='$author',
							quantity='$quantity'
							WHERE id='$id'";
						}
						
							
							$result=$this->update($query);
							if($result){
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Cập nhật thành công!")';
									echo '});';
									echo '</script>';
								}
								else{
									echo '<script language="javascript">';
                       				echo 'document.addEventListener("DOMContentLoaded", function() {';
                       				echo ' alertify.alert("Cập nhật không thành công!")';
									echo '});';
									echo '</script>';
								}	
					}
			}
			public function DeleteProduct($id)
			{
					$query="DELETE FROM product WHERE id='$id' ";
					$result=$this->delete($query);
					return $result;
			}

		}
?>