<?php
/**
 * Created by PhpStorm.
 * User: sysadmin
 * Date: 2/3/19
 * Time: 7:00 PM
 */

include_once "MysqlDatabase.php";

class Student extends MysqlDatabase {
   
    var $id;
    var $name;
    var $age;
    var $gender;
    var $city;
    var $address;
    var $education;
    var $grade;

    function __construct(){
        parent::__construct();
    }

    /**
     * @param int $Id
     * @param int $limit
     * @return array
     */
    public function stdentList($id=0, $limit=5) : array {
        
        return $this->select($id,$limit);
    }

    /**
     * @param array $studentData
     * @return integer
     */
    public function updateStudent($studentData) : int {
        
        return $this->updateData($studentData);
    }

    /**
     * @param array $studentData
     * @return integer
     */
    public function insertStudent($studentData) : int {

        return $this->insertData($studentData);
    }

    /**
     * @param integer $id
     * @return integer
     */
    public function deleteStudent($id) : int {
        
        return $this->deleteData($id);
    }
}
?>
