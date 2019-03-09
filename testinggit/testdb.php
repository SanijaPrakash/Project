<?php
$host = "localhost";
$username ="root";
$password = "root";

//$db="phptest"


$conn = mysqli_connect($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
	{
		echo "Connected successfully";
}

// $sql= "create table user(firstname varchar(20),lastname varchar(20))";

// if ($conn->query($sql) === TRUE) {
//     echo "table created"
// }
// else
// {
//     echo "Error";
// }

// $ins = "INSERT INTO user (id, firstname) VALUES ('sani','k')";

// if ($conn->query($ins) == TRUE) {
//     echo "table created"
// }
// else
// {
//     echo "Error";
// }

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
$conn->close();

?>