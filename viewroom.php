<?php

/* Broken */

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = 'stea3660';
   $rid = $_POST['res_id']; 

   try {
      $conn = new mysqli($server,$username,$password, $db);
   } catch (Exception $e) {
   echo $e ->getMessage(); 
   }
      /* Given the reservation id, display all the information in room table  */
      $sql = "select * from ROOM WHERE res_id = $rid";
      $result = $conn->query($sql); 
      if($result->num_rows != 0) 
      { 	
         echo "<table border=1>";
         echo "<tr>";
         echo "<th>Reservation ID</th>";
         echo "<th>Room number</th>";
         echo "<th>Price</th>";
         echo "<th>Type of room</th>";
         echo "<th>Vacancy</th>";
         echo "</tr>";

         $rec = $result->fetch_assoc();
      
         echo "<tr>";
         echo "<td>$rec[res_id]</td>";
         echo "<td>$rec[room_num]</td>";
         echo "<td>$rec[price]</td>";
         echo "<td>$rec[room_type]</td>";
         echo "<td>$rec[vacancy]</td>";
         echo "</tr>";
      
         echo "</table>";
      }
      else {
         echo "<p>Reservation ID $rid does not exist!</p>"; 
      }
} else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<a href=\"main.php\">Return</a> to Home Page."; 

?>


