<html>
<head><title>Motel Jephen</title></head>
<body>

<?php
if(isset($_COOKIE['username'])){

   echo "<form action=\"updateguest.php\" method=post>";

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

    /* Display table for Guest */
    $sql = "select * from GUEST";
    $result = $conn->query($sql);
    if($result->num_rows != 0)
    {
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

    /* Provide dropdown featuring each guest's number */
   $sql = "select guest_num from GUEST"; 
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Guest Number: <select name=\"guest_num\">";
	      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[guest_num]'>$val[guest_num]</option>"; 

      }
      echo "</select>"; 
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
