<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
</head>
<body>
	<form action="list.php" method="post">
		<table cellpadding="10" align="center">
			<tr>
				<td>Product Name: </td>
				<td><input type=text name="name" ></td>
			</tr>
			<tr>
				<td>Pseudo name</td>
				<td><input type=text name="pseudoname" ></td>
			</tr>
			<!-- <tr>
				<td>Image</td>
				<td><input type="file" name="img"></td>
			</tr> -->
			<tr>
				<td>Price</td>
				<td><input type=text name="price" ></td>
			</tr>
			<tr>
				<td>Date</td>
				<td><input type=text name="date" ></td>
			</tr>
			<tr>
				<td>Weighing in</td>
				<td>
					<select name="weigh">
						<option value="">Select an option</option>
						<option value="ton">Ton</option>
						<option value="gram">Gram</option>
						<option value="kilogram">Kilogram</option>
					</select>
			
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="SUBMIT">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>