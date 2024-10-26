<html>
<head><title>Motel Jephen</title></head>
<body>

<?php
if(isset($_COOKIE["username"])){
   
   echo "<form action=\"insert_guest2.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "stea3660"; 

   $conn = new mysqli($server,$username,$password,$db);
   
	/* find reservation ids */
   $sql = "select rid from RES";
   $result = $conn->query($sql);

   /* If reservation IDs exist, display dropdown of all available reservation IDs */
   if($result->num_rows != 0)
   {
    echo "Reservation Number: <select name=\"rid\">";
    while($val = $result->fetch_assoc())
    {
    echo "<option value='$val[rid]'>$val[rid]</option>";
    }
    echo "</select>"; 
    echo "<input type=submit name=\"submit\" value=\"Choose\">"; 
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
