<?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = 'stea3660';
   $rid = $_POST['rid'];
   $room = $_POST['room'];

   try {
      $conn = new mysqli($server,$username,$password, $db);
   } catch (Exception $e) {
   echo $e ->getMessage(); 
   }

   $sql = "select * from RES where rid='$rid'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      /* Display table for Reservation */
      echo "<br> Reservation information for <strong> Reservation $rid: </strong><br><br>";
      echo "<table border=1>";
      echo "<tr>";
      echo "<th>Reservation ID</th>";
      echo "<th>Guest ID</th>";
      echo "<th># of Rooms</th>";
      echo "<th># of Guests</th>";
      echo "<th>Check In</th>";
      echo "<th>Check Out</th>";
      echo "<th>Reservation Status</th>";
      echo "</tr>";
      $rec = $result->fetch_assoc();
      echo "<tr>";
      echo "<td>$rec[rid]</td>";
      echo "<td>$rec[id]</td>";
      echo "<td>$rec[room]</td>";
      echo "<td>$rec[guest]</td>";
      echo "<td>$rec[check_in]</td>";
      echo "<td>$rec[check_out]</td>";
      echo "<td>$rec[status]</td>";
      echo "</tr>";
	
      echo "</table>";
   
      /* Display table for Guest */
      $sql = "select * from GUEST, RES where RES.id = GUEST.id AND rid='$rid'";
      $result = $conn->query($sql);
      if($result->num_rows != 0)
      {
      echo "<br> Guest information for <strong> Reservation $rid: </strong> <br><br>";
	   echo "<table border=1>";
      echo "<tr>";
      echo "<th>Guest Number</th>";
      echo "<th>Guest ID</th>";
      echo "<th>Guest Name</th>";
      echo "<th>Guest Date of Birth</th>";
      echo "<th>Guest Email</th>";
      echo "<th>Guest Phone#</th>";
      echo "</tr>";
	   while($rec = $result->fetch_assoc())
	   { 
	    echo "<tr>";
       echo "<td>$rec[guest_num]</td>";
	    echo "<td>$rec[id]</td>";
	    echo "<td>$rec[name]</td>";
	    echo "<td>$rec[dob]</td>"; 
       echo "<td>$rec[email]</td>";
	    echo "<td>$rec[phone]</td>";
	    echo "</tr>";
	   }
	   echo "</table>"; 
      }
      else {
	      echo "<p> The $rid Reservation currently has no Guests.</p>";
      }
      /* Display Room table*/
      $sql = "select * from ROOM where res_id=$rid";
      $result = $conn->query($sql); 
         echo "<br><strong>Room Information: </strong><br><br>";
         echo "<table border=1>";
         echo "<tr>";
         echo "<th>Room number</th>";
         echo "<th>Price</th>";
         echo "<th>Type of room</th>";
         echo "<th>Vacancy</th>";
         echo "</tr>";
      if($result->num_rows > 0) 
      { 	
         
         //$rec = $result->fetch_assoc();
         while ($rec = $result->fetch_assoc()){
         echo "<tr>";
         echo "<td>$rec[room_num]</td>";
         echo "<td>$rec[price]</td>";
         echo "<td>$rec[room_type]</td>";
         echo "<td>$rec[vacancy]</td>";

         echo "</tr>";
         }
         echo "</table>";
         
      } else {
         echo "<p>No record of room</p>";  
      }
   }
   else {
      
      echo "<p>Reservation ID $rid does not exist!</p>"; 
   
   }

}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<br> <a href=\"main.php\">Return</a> to Home Page."; 

?>
