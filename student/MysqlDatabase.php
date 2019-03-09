<?php
/**
 * Created by PhpStorm.
 * User: sysadmin
 * Date: 2/3/19
 * Time: 5:02 PM
 */

class MysqlDatabase{
    private $conn;
    private $debug;

    function __construct(){
        $this->connect();
    }

    /**
     *
     */
    private function connect() : void {
        $this->conn = new mysqli(
            "localhost",
            "root",
            "vinam@123",
            "student",
            "3306"
        );
        if(!$this->conn)
            die($this->conn->connect_error);

    }

    /**
     * @param integer $debug
     */
    public function setDebug($debug): void {
        $this->debug = $debug;
    }

    /**
     * @param string $sql
     * @param string $type
     * @return integer/array
     */
    public function select($id=0,$limit=5) {
        $a1=array_keys(get_class_vars(get_called_class()));
         $a2=array_keys(get_class_vars(get_class()));


       //print_r($a1);
     // $cl=get_called_class();
     // echo $cl;
        $fields=array_diff($a1, $a2);
      
         $table_fields  = implode(",",$fields);
        $sql = "select ".$table_fields . " from " . get_called_class();
       $sql = $id > 0 ? $sql . " where id=" . $id . " limit 1" : $sql . " limit $limit";
       // print_r($table_fields);
        //die();

        if($this->debug==1)
          //  echo "\n Query : ". $sql ."\n";
        $resultSet = $this->conn->query($sql);
        return $resultSet->fetch_all(1);
    }


    /**
     * @param array $data
     * @return integer
     */

    public function insert($data):int{

         $a1=get_class_vars(get_called_class());
         $a2=get_class_vars(get_class());
           $fields=array_diff($a1, $a2);
          $sql = "insert into ". get_called_class(). " SET ";
         foreach ($data as $key => $value){
             if(array_key_exists($key,$fields){
                 $sql.= $key. "='" . $value ."',";
             }
         }
         $sql =rtrim($sql,',');
           if($this->debug==1)
          //  echo "\n Query : ". $sql ."\n";
        $resultSet = $this->conn->query($sql);
        return $resultSet->fetch_all(1);
    }

    /**
     * @param integer $delete_id
     * @return integer
     */
    public function delete($delete_id):int{

           $sql = "delete from ". get_called_class().
        $sql .=" where id=".$delete_id;
 if($this->debug==1)
          //  echo "\n Query : ". $sql ."\n";
        $resultSet = $this->conn->query($sql);
        return $resultSet->fetch_all(1);

    }

    /**
     * @param array $data
     * @return integer
     */

    public function update($data):int{

        $a1=get_class_vars(get_called_class());
         $a2=get_class_vars(get_class());
           $fields=array_diff($a1, $a2);
         $sql = "update ". get_called_class() . " SET ";
        foreach ($data as $key => $value){
            if(array_key_exists($key,$fields){
                $sql.= $key. "='" . $value ."',";
            }
        }
        $sql =rtrim($sql,',');
        $sql .=" where id=".$data['id'];
    }
}