<?php
$username = $_POST['username'];
$password = $_POST['password'];
$server = "vlamp.cs.uleth.ca";
$db = "stea3660";

try {
$con = mysqli_connect($server, $username, $password, $db); 
} catch (Exception $e)
{
	echo $e -> getMessage(); 
}
echo "username is $username and password is $password."; 

setcookie("username",$username,time()+3600);
setcookie("password",$password,time()+3600);

header("Location:main.php"); 

?>