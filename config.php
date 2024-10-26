<?php
if (isset($_COOKIE['username']))  
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$server = "vlamp.cs.uleth.ca";
$db = "stea3660";

// Create connection
$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the RES table
$sql = "CREATE TABLE RES (rid INT,id INT,room INT,guest INT,check_in VARCHAR(10),check_out VARCHAR(10),status VARCHAR(20))";
$sql = "CREATE TABLE GUEST (guest_num INT AUTO_INCREMENT PRIMARY KEY,id INT, name VARCHAR(20),dob VARCHAR(10), email VARCHAR(30), phone VARCHAR(20))";


if ($conn->query($sql) === TRUE) {
    echo "Table RES created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
