
 <?php

if (isset($_COOKIE['username'])) {
   $username = $_COOKIE['username'];
   $password = $_COOKIE['password'];
   $server = "vlamp.cs.uleth.ca";
   $db = "stea3660"; 
   $resid = $_POST['rid'];
   $room = $_POST['room'];
   $roomtype = $_POST['dropdown']; 
   $vacancy = $_POST['vacancy'];

   $conn = new mysqli($server,$username,$password,$db);

   /* Handle user input for room selection, adjust price based on choosen value */
   if ($roomtype == "Deluxe") {
		$price = $_POST['price_del'];
   } else {
		$price = $_POST['price_reg'];
   }

   /* Based on the number of rooms chosen, use a loop to insert each room into ROOM table */
for ($i = 0; $i < $room; $i++){
$sql = "INSERT INTO ROOM (res_id, price, room_type, vacancy) VALUES ('$resid', '$price', '$roomtype', '$vacancy')";
if($conn->query($sql) == TRUE)  
	{ 
		echo "<h3> Room successfully added!</h3>";  
	} else {
		$err = $conn->errno; 
		if($err == 1062)
		{
		echo "<p>Error: trying to overwrite existing reservation id: $_POST[res_id]</p>"; 
		} else {
		echo "<p>MySQL error code $err </p>"; 
		}
	}
} echo "<a href=\"main.php\">Return</a> to Home Page."; 
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}

?>