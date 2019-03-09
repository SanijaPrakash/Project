<?php
class Database{
	private $conn;

	/**
	*
	**/
	function __construct()
	{
		$this->connect();
	}

	/**
	*@return void
	**/
	public function connect(): void{

		$this->conn=new mysqli(
			"localhost",
			"root",
			"vinam@123",
			"student",
			"3306"
		);

		if(!$this->conn){
			die($this->conn->error_log("error"));
		}
	}


	/**
	*@param Int $id
	*@param Int $limit
	*@return array
	**/
	public function select($id=0,$limit=5){
		$unUsed=array(0=>"conn");
		// echo $unUsed;
		// die();
		$classVariables=array_keys(get_class_vars(get_called_class()));
		$variables=array_diff($classVariables, $unUsed);
		$tbl_feilds=implode(",",$variables);
		$sql="select ".$tbl_feilds." from ".get_called_class();
		$sql=$id>0 ? $sql."where id=".$id." limit 1 ":$sql." limit $limit";
		$result=$this->conn->query($sql);
		return $result->fetch_all(1);

	}

	/**
	*@param array $data
	*@return int
	*/

	public function insert($data):int{
		// $unUsed=array(0=>conn,1=>image);
		$unUsed=array(0=>"conn");
		$classVariables=array_keys(get_class_vars(get_called_class()));
		$variables=array_diff($classVariables, $unUsed);
		$sql="insert into ".get_called_class()." SET ";
		
		foreach ($data as $key => $value) {
			if(array_key_exists($key, $variables)){
				$sql.=$key." = ".$value.",";
			}
			//echo $key;
			
		}
			$sql=rtrim($sql,",");
			$result=$this->conn->query($sql);
			return $result;
	}
}
?>
