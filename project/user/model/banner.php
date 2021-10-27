<?php	
		include_once ("model/db.php");
		
		class Banner extends Database
		{
			public function show(){
				$query="SELECT *FROM banner ";
				$result=$this->select($query);
				return $result;
			}
			

		}
?>