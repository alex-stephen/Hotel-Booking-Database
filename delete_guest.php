<html>
<head><title>Mtoel Jephen</title></head>
<body>



<?php

if(isset($_COOKIE["username"]))
{
   echo "<form action=\"deleteguest.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $db = "stea3660"; 
   $server = "vlamp.cs.uleth.ca"; 

   $conn = new mysqli($server,$username,$password,$db);
   
    /* Select reservation id and guest id from reservation table*/
   $sql = "select rid, id from RES"; 
   $result = $conn->query($sql);

   /* If tuples exist for the query, populate dropdown with reservation IDs and provide deletion option */
   if($result->num_rows != 0)
   {
      echo "Reservation ID: <select name=\"rid\">";
      
      while($val = $result->fetch_assoc())
      {
	      echo "<option value='$val[rid]'>$val[rid]</option>"; 
      }
      $val = $result->fetch_assoc();
      echo "</select>";
      echo "<input type=hidden name=\"id\" value=\"$val[id]\">";
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   /* If no tuples exist, output error code */
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
