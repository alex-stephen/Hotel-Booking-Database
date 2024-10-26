<html>
<head><title>Motel Jephen</title></head>
<body>
<?php

try{

if(isset($_COOKIE["username"]))
{
   echo "<form action=\"selectres.php\" method=post>";
	
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

   /*  Select all reservations and place them in dropdown to select */
   $sql = "select rid, room from RES";

   try {
   $result = $conn->query($sql);
   } catch (Exception $e) {
      echo $e->getMessage(); 
      echo " Problem with processing query";
      exit; 
   }

   if($result->num_rows > 0)
   {
      echo "Reservation ID: <select name=\"rid\">";
	      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='".$val['rid']."'>".$val['rid']."</option>"; 
	      
      }
      $val = $result->fetch_assoc();
      echo "</select>"; 
      echo "<input type=hidden name=\"room\" value=\"$val[room]\">";
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>There are reservations in the system!</p>"; 
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