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

/* Update the reservation table based on user inputs in updateres.php */
$sql = "update RES set rid='$_POST[rid]',id='$_POST[id]',room='$_POST[room]',guest='$_POST[guest]',check_in='$_POST[check_in]',check_out='$_POST[check_out]',status='$_POST[status]' where rid='$_POST[oldname]'"; 

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

echo "<a href=\"main.php\">Return</a> to Home Page.";

} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>