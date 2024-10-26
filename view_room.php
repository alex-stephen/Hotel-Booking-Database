<html>
<head><title>Motel Jephen</title></head>
<body>
<?php

try{

if(isset($_COOKIE["username"]))
{
   echo "<form action=\"viewroom.php\" method=post>";
	
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	
   $server = "vlamp.cs.uleth.ca";
   $db = "stea3660";

   try {
   $conn = new mysqli($server,$username,$password, $db);
   } catch (Exception $e){
      echo $e->getMessage(); 
      echo "Error connecting!";
      exit; 
   }

   /* Provide user with all available rooms to view and process room they select */
   $sql = "SELECT res_id, room_num, price, room_type, vacancy FROM ROOM";

   try {
   $result = $conn->query($sql);
   } catch (Exception $e) {
      echo $e->getMessage(); 
      echo " Problem with processing query";
      exit; 
   }

   if($result->num_rows > 0)
   {
      echo "Reservation ID: <select name=\"res_id\">";
	      
      while($val = $result->fetch_assoc())
      {
	      echo "<option value='".$val['res_id']."'>".$val['res_id']."</option>"; 
	      
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>There are no rooms reserved!</p>"; 
   }
   
   echo "</form>";
}
else echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

} catch (PDOException $ex) {

   echo $ex->getMessage(); 
  }

?>


 
</body>
</html>