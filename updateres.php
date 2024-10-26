<html>
<head><title>University of Wendy</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updateres2.php\" method=post>";

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
	
	/* Select the reservation for the chosen reservation ID in update_res.php */
	$sql = "select * from RES where rid='$_POST[rid]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
	   $rec=$result->fetch_assoc(); 
	   echo "Reservation ID: <input type=text name=\"rid\" value=\"$rec[rid]\"><br><br>";
	   echo "Guest ID: <input type=text name=\"id\" value=\"$rec[id]\"><br><br>";
	   echo "Number of Guest(s): <input type=text name=\"guest\" value=\"$rec[guest]\"><br><br>";
	   echo "Check-in: <input type=text name=\"check_in\" value=\"$rec[check_in]\"><br><br>";
	   echo "Check-out: <input type=text name=\"check_out\" value=\"$rec[check_out]\"><br><br>";
	   echo "Status: <input type=text name=\"status\" value=\"$rec[status]\"><br><br>";
	   echo "<input type=hidden name=\"oldname\" value=\"$_POST[rid]\">";
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
