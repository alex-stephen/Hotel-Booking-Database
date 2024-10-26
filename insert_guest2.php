<html>
<head><title>Motel Jephen - Add New Guest</title></head>
<body>

<?php
if(isset($_COOKIE["username"])){
   
   echo "<form action=\"insertguest.php\" method=post>";
   
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "stea3660";
   $rid = $_POST['rid'];

   $conn = new mysqli($server,$username,$password,$db);
   
	/* select reservation ID and guest IDS */
   $sql = "select rid, id from RES WHERE rid = $rid"; //

   /* Given the reservation id, if it exists display a table containing the reservation ID and the guest ID */
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      echo "<table border=1>";
      while($rec = $result->fetch_assoc()) {
    
		echo "<tr>";
		echo "<td>Reservation ID: $rid</td>";
		echo "<td>Guest ID: $rec[id]</td>";
		echo "</tr>";
      }
      echo "</table>";

   } else {

      echo "<p>Guest $rid has no Reservations.</p>"; 
   
   }
   /* Provide input boxes for adding guest information */
   if($result->num_rows != 0)
   {
      echo "Guest ID: <input type=text name=\"id\" size=20> <br><br>";
      echo "Guest Name: <input type=text name=\"name\" size=20> <br><br>";
      echo "Guest Date of Birth: <input type=text name=\"dob\" size=10> <br><br>"; 
      echo "Guest email: <input type=text name=\"email\" size=25> <br><br>";
      echo "Guest phone number: <input type=text name=\"phone\" size=10> <br><br>";
      echo "<input type=submit name=\"submit\" value=\"Add Guest\">"; 
   }
   else
   {
      echo "<H3>There are no Reservations in the system! </H3>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}
?>


 
</body>
</html>
