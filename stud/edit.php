<?php
include "MysqlDatabase.php";
include "Student.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
$edit_id=$_GET['edit'];
$student  = new Student();
$student->setDebug(1);
$students_list   = $student->stdentList($edit_id);
if(!empty($students_list)){
	$students_list = $students_list[0];
}

if(isset($_POST['update'])){
	$_POST["id"]=$edit_id;
	$up=$student->updateStudent($_POST); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title align="center">STUDENT REGISTRATION</title>
	<style>
		.btnbutton{
			background-color: #000000;
			color: white;
			padding: 10px 32px;
			text-align: center;
			margin: 4px 2px;
			font-size: 18px;
		}
		input,select,textarea{
			font-size: 14px;
		}
		
	</style>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	
	$(function() {

  $("form[name='form']").validate({
    
    rules: {
      	name:{
			required:true
		},
		age: {
			required: true
		},
		address:{
			required:true
		},
		city:{
			required:true
		},
		education:{
			required:true
		},
		grade:{
			required:true
		}
    },
    messages: {
      name: { 
      	required:"Please enter your firstname"
	  },
	  age: {
	  	required:"Please enter your age"
	  },
	  address:{
	  	required:"address plzz"
	  },
	  city:{
	  	required:"plz enter"
	  },
	  education:{
	  	required:"plzz enter"
	  },
	  grade:{
	  	required:"plzz grade"
	  }
	},
	submitHandler: function(form) {
      form.submit();
    }
  });

    $("#btnsubmit").click(function() {     
      if($('input[type=radio][name=gender]:checked').length == 0)
      {
         alert("Please select atleast one gender");

         return false;
      }
      else
      {
      }      
    });
});
</script>
</head>
<body>
	
	<h1 align="center">STUDENT REGISTRATION</h1>
	
	<form method="post" id="form" name="form" action="edit.php?edit= <?php echo $edit_id; ?> ">
		<!-- <form method="post" id="form" name="form" action="list.php"> -->
		<table align="center" cellpadding="20">
			<tr>
				<td colspan="2">NAME:</td>
				<td colspan="2"><input type="text" id="name" name="name" value="<?php echo $students_list['name']; ?>" ></td>  
				<td><p id="nameerr"></p></td> 
			</tr>
			<tr>
				<td colspan="2">AGE:</td>
				<td colspan="2"><input type="number" id="age" name="age" value="<?php echo $students_list['age']; ?>" ></td>
			</tr>
			<tr>
				<td colspan="2">SEX:</td>
				<td rowspan="1"><input type="radio" value="Male" name="gender" id=gender <?php if($students_list['gender']=='Male'){ echo 'checked';}?>/> Male</td>
				<td rowspan="1"><input type="radio" value="Female" name="gender" id=gender <?php if($students_list['gender']=='Female'){ echo 'checked';}?>/>Female</td><label id=gender></label>
			</tr>
			<tr>
				<td colspan="2">CITY:</td>
				<td colspan="2">
					<select name="city" >
						<option value="">Select a city</option>
						<option value="Kannur" <?php if($students_list['city']=='Kannur'){ echo 'selected';}?>/>KANNUR</option>
						<option value="Calicut" <?php if($students_list['city']=='Calicut'){ echo 'selected';}?>/>KOZHIKODE</option>
						<option value="Kochi" <?php if($students_list['city']=='Kochi'){ echo 'selected';}?>/>KOCHI</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">ADDRESS:</td>
				<td colspan="2"><textarea name="address" rows="4" cols="20" ><?php echo $students_list['address']; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2">EDUCATION:</td>
				<td colspan="2">
					<select name="education" id="education" multiple>
						<option value="MCA" <?php if($students_list['education']=='MCA'){ echo 'selected';}?>/>MCA</option>
						<option value="MBA" <?php if($students_list['education']=='MBA'){ echo 'selected';}?>/>MBA</option>
						<option value="BCA" <?php if($students_list['education']=='BCA'){ echo 'selected';}?>/>BCA</option>
						<option value="BBA" <?php if($students_list['education']=='BBA'){ echo 'selected';}?>/>BBA</option>
						<option value="BSC Physics" <?php if($students_list['education']=='BSC Physics'){ echo 'selected';}?>/>BSC Physics</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">GRADE:</td>
				<td colspan="2">
					<select name="grade">
						<option value="">Select a grade..</option>
						<option value="A" <?php if($students_list['grade']=='A'){ echo 'selected';}?>/ >A</option>
						<option value="B" <?php if($students_list['grade']=='B'){ echo 'selected';}?>/ >B</option>
						<option value="C" <?php if($students_list['grade']=='C'){ echo 'selected';}?>/ >C</option>
						<option value="D" <?php if($students_list['grade']=='D'){ echo 'selected';}?>/ >D</option>
					</select>
				</td>
			</tr>
		</table>
	<p align="center"><button id=update type="submit" class="btnbutton" name="update" value="update">update</button></p>
</form>
</body>
</html>