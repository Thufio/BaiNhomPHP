<?php
		include_once 'model/db.php';
		class Product extends Database
		{
			
			//Get x sản phẩm ra trang cart
			public function GetXProduct($quan)
			{
				
                                
                                $query="SELECT `id`, `name`, `price1`, `price2`, `image_link` FROM `product`";
                                $get_result=$this->select($query);
                                return $get_result;
                                
			}
			//Get sản phẩm trang index
			public function GetAllProduct()//Lấy tất cả sản phẩm ra trang index
			{
								$query="SELECT `id`, `name`, `price1`, `price2`, `image_link` FROM `product`";
                                $get_all=$this->select($query);
                                return $get_all;
                                
			}
			
			//Get sản phẩm trang single-product
			public function GetDetailProduct($id)//Lấy thông tin chi tiết ra trang single-product
			{
				$query="SELECT * FROM product WHERE id = '$id'  LIMIT 1";
				$result=$this->select($query);
				
                return $result;
        
			}
			public function GetRelativeProduct($id)//Lấy thông tin các sản phẩm liên quan ra trang single-product
			{
				$query="SELECT `id`,`name`, `price1`, `price2`, `image_link` FROM `product` WHERE  id <>'$id'";
				$result=$this->select($query);
			     return $result;
               
			}
			public function InsertProduct($data)
			{
					
			}
			public function UpdateProduct($data)
			{
					
			}
			public function DeleteProduct($data)
			{
		
			}

		}
?>