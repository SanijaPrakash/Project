
<?php
 
class Database{
	
	public $connection;
 
	public function connect_db(){
		$this->connection = new mysqli('localhost', 'root', 'vinam@123', 'student');
	}

	function __construct()
	{
		$this->connect_db();
	}

	public function create($table_name,$data=object()){

$chk=array();
		foreach ($_POST as $key => $value) {
	if(array_key_exists($key, $data))

	{
//$chk[$key => $data]

	}
		//echo $key ."=>" . $value ."<br />";
}

		$sql = "insert into $table_name SET ";
		foreach ($data as $key => $value) {
			$sql.=$key. "=". $value. ",";
		}
		echo $sql; die();
		return $this->connection->query($sql);
	}
}
?>