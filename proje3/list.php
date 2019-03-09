<?php

include "Product.php";
$productobj = new Product();
$insert=$productobj->insert($_POST);
print_r($_POST);
$lists=$productobj->select();

//print_r($productobj);
?>

<!DOCTYPE html>
<html>
<head>
	<title>List</title>
</head>
<body>

	<table align="center" border=1>
		<tr>
			<th>
				Name
			</th>
			<th>
				Pseudo name
			</th>
			<th>
				Price
			</th>
			<th>
				Date
			</th>
			<th>
				Weigh
			</th>
		</tr>
		<tr>
			<?php
			foreach ($lists as $key => $value) {
				
				echo "<td>".$lists["productname"]."</td>";
				echo "<td>".$lists["pseudoname"]."</td>";
				echo "<td>".$lists["price"]."</td>";
				echo "<td>".$lists["date"]."</td>";
				echo "<td>".$lists["weigh"]."</td>";
			}

			?>
			
		</tr>

	</table>

</body>
</html>