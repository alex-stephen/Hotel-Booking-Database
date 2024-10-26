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

/* Update guest information given the selections made in update_guest.php  */
$sql = "update GUEST set id='$_POST[id]', name='$_POST[name]',dob='$_POST[dob]',email='$_POST[email]',phone='$_POST[phone]' where guest_num='$_POST[oldname]'"; 

try
{
	$conn->query($sql); 
	echo "<h3> Guest Info updated!</h3>";

} catch (Exception $e) {
  
   $err = $conn->errno; 
   if($err == 1062)
   {
      echo "<p>Guest ID $_POST[guest_num] already exists!</p>"; 
   } else {
      echo "error code $err";
   }
   
}

echo "<a href=\"main.php\">Return</a> to Home Page.";

} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>