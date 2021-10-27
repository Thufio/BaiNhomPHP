<?php
class Database{
	private $hostname='localhost';
	private $username='root';
	private $passwd='';
	private $dbname='bookstore';
	public $conn=NULL;
	public $result=NULL;

	public function __construct(){
		$this->connect();
	}
	private function connect(){
		$this->conn=new mysqli($this->hostname,$this->username,$this->passwd,$this->dbname);
		if(!$this->conn){
			echo "Kết nối thất bại";
			exit();
		}
		else{
			mysqli_set_charset($this->conn,'utf8');
		}
		return $this->conn;
	}

	//Thực thi câu lệnh truy vấn

	public function execute($sql)
	{
		$execute=$this->conn->query($sql);
		return $execute;
	}
	// Select or Read data
	public function select($query){
  		$select = $this->execute($query);
  		if($select->num_rows > 0){
    		return $select;
  		} else {
    		return false;
  		}
 	}
 
	// Insert data
	public function insert($query){
   		$insert_row = $this->execute($query);
   		if($insert_row){
     		return $insert_row;
   		} else {
     		return false;
    	}
 	}
  
// Update data
 	public function update($query){
   		$update_row = $this->execute($query);
   		if($update_row){
    		return $update_row;
   		} else {
    		return false;
    	}
 	}
  
// Delete data
 	public function delete($query){
   		$delete_row = $this->execute($query);
   		if($delete_row){
     		return $delete_row;
   		} else {
    		 return false;
    	}
    }
	
}
?>