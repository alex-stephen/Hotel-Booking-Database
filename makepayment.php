<?php
if (isset($_COOKIE["username"])) { 
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$server = "vlamp.cs.uleth.ca";
$db = "stea3660"; 

try {
$conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
  echo $e->getMessage();
  exit; 
}

/* Update reservation status if payment is made */
$sql = "update RES set status='$_POST[status]' where rid='$_POST[rid]'"; 

try
{
	$conn->query($sql); 
	echo "<h3> Reservation updated!</h3>";

} catch (Exception $e) {
  
   $err = $conn->errno; 
   if($err == 1062)
   {
      echo "<p>Reservation ID $_POST[rid] already exists!</p>"; 
   } else {
      echo "error code $err";
   }
   
}

/* Update payment information */
$sql = "INSERT INTO PAYMENT (status, method, resid) VALUES ('$_POST[status]', '$_POST[method]' , '$_POST[rid]')";
if($conn->query($sql) == TRUE)  
{ 
	echo "<h3> Payment added!</h3>";  
} else {
	$err = $conn->errno; 
	if($err == 1062)
	{
	   echo "<p>Payment already exists!</p>"; 
	} else {
	   echo "<p>MySQL error code $err </p>"; 
	}
 }

echo "<a href=\"main.php\">Return</a> to Home Page.";

} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>