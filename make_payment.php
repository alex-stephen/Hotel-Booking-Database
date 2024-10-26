<html>
<head><title>Motel Jephen</title></head>
<body>

<?php
if(isset($_COOKIE['username'])){

   echo "<form action=\"makepayment.php\" method=post>";

   $username = $_COOKIE['username'];
   $password = $_COOKIE['password'];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "stea3660"; 

   try {
      $conn = new mysqli($server,$username,$password,$db);
   } catch (Exception $e) {
   echo $e->getMessage();
   exit; 
   }

   /* Provide drop down for current reservations */
   $sql = "select rid from RES"; 
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Reservation ID: <select name=\"rid\">";
	      
      while($val = $result->fetch_assoc())
      {
	      echo "<option value='$val[rid]'>$val[rid]</option>"; 
      }
      $val = $result->fetch_assoc();
      echo "</select>";
      echo "<input type=hidden name=\"status\" value=\"Confirmed\">";
      echo "<input type=hidden name=\"method\" value=\"Card\">";
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>Enter Data!</p>"; 
   }

   echo "</form>";
}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}

?>


 
</body>
</html>