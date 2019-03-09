<?php
include "MysqlDatabase.php";
include "Student.php";

$database= new MysqlDatabase();
$student  = new Student();
$student->setDebug(1);
if(isset($_GET['delete'])){
	$delete_id=$_GET["delete"];
	$delete=$student->deleteStudent($delete_id); 
}
$stud=$student->insertStudent($_POST);
$students_list= $student->stdentList();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LISTING</title>
</head>
<body>
<table border=1 cellpadding=10>
	<tr>
		<th> NAME</th>
		<th> AGE</th>
		<th> GENDER</th>
		<th colspan=2>DEL </th>
		<th colspan=2 >EDIT</th>
	</tr>
	<?php
	foreach ($students_list as $key => $value) {
		$id=$value['id'];
	 	echo $str3 ='<tr> <td>'.$value["name"].'</td><td>'.$value["age"].'</td><td>'.$value["gender"].'</td>';
		echo $str = '<td colspan=2> <a href="list.php?delete='.$id.'" onclick= "return confirm(\'Are u sure ?\');"> DELETE </a></td> ';
		echo $str1 = '<td colspan=2> <a href="edit.php?edit='.$id.'" onclick= "return confirm(\'Are u sure ?\');"> EDIT </a></td> ';
		echo $str4="</tr>";
	}
	echo $str5= "</table> ";
	?>
</body>
</html>
