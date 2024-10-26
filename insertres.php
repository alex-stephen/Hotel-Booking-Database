<?php

if (isset($_COOKIE['username'])) { 
	echo "<form action=\"insertroom.php\" method=post>";
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$server = "vlamp.cs.uleth.ca";
	$db = "stea3660";

	$numberOfRooms = intval($_POST['room']);
	
	try{
	$conn = new mysqli($server,$username,$password, $db);
	} catch (Exception $e) {
		echo $e -> getMessage();   
	}
	
	/* Insert into reservation table given the supplied values from insert_res.php */
	$sql = "INSERT INTO RES (rid, id, room, guest, check_in, check_out, status) VALUES ('$_POST[rid]', '$_POST[id]', '$_POST[room]', '$_POST[guest]', '$_POST[check_in]', '$_POST[check_out]', '$_POST[status]')";

	/* After successful insertion, user provided Choose Room button for choosing room type */
if($conn->query($sql) == TRUE)  
{ 
	echo "<h3> Reservation added!</h3> <br><br>";  

	echo "<input type=hidden name=\"res_id\" value=\"$_POST[rid]\">";
	echo "<input type=hidden name=\"rooms\" value=\"$_POST[room]\">";
	echo "</select>";
	echo "<input type=submit name=\"submit\" value=\"Choose Room\">";
} else {
	$err = $conn->errno; 
	if($err == 1062)
	{
	   echo "<p>Reservation name $_POST[rid] already exists!</p>"; 
	} else {
		echo "<p>MySQL error code $err </p>"; 
	}
	
 }
 echo "</form>";
} else {
	echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
	
 }
?>