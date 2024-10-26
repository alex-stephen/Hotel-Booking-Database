<html>
<head><title>Jephen Motel</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updateguest2.php\" method=post>";

	$username = $_COOKIE["username"];
	$password = $_COOKIE["password"];	
    $server = "vlamp.cs.uleth.ca"; 
    $db = "stea3660"; 

    try {
	$conn = new mysqli($server,$username,$password,$db);
	} catch (Exception $e) {
	   echo "Connection Problem!";
	   exit; 
	}
	
	/* Select information for selected guest_num, which is chosen in update_guest.php */
	$sql = "select * from GUEST where guest_num='$_POST[guest_num]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{	
		/* Provide input fields for guest's attributes */
	   $rec=$result->fetch_assoc(); 
	   echo "Guest ID: $rec[id] <br><br>";
	   echo "Guest Name: <input type=text name=\"name\" value=\"$rec[name]\"><br><br>";
	   echo "Guest Date of Birth: <input type=text name=\"dob\" value=\"$rec[dob]\"><br><br>";
	   echo "Guest email: <input type=text name=\"email\" value=\"$rec[email]\"><br><br>";
	   echo "Guest phone number: <input type=text name=\"phone\" value=\"$rec[phone]\"><br><br>";
	   echo "<input type=hidden name=\"oldname\" value=\"$_POST[guest_num]\">";
       echo "<input type=hidden name=\"id\" value=\"$rec[id]\">";
	   echo "<input type=submit name=\"submit\" value=\"Update\">"; 

	}
	else
	{
		echo "<p>YOU HAVE NO DATA!</p>"; 
	}

	echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>
