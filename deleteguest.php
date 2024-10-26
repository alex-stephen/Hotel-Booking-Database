<html>
<head><title>Mtoel Jephen</title></head>
<body>

<?php

if(isset($_COOKIE["username"]))
{
   echo "<form action=\"deleteguest2.php\" method=post>";
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $db = "stea3660"; 
   $server = "vlamp.cs.uleth.ca";
   $rid = $_POST['rid'];
   $id = $_POST['id']; 

   $conn = new mysqli($server,$username,$password,$db);

   /* Display table for Guest */
    $sql = "select * from GUEST, RES where RES.id = GUEST.id AND rid = $rid";
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
        echo "<p> The Reservation $rid currently has no Guests.</p>";
    }
   
   /* Display dropdown to select guest id for deletion */
   $sql = "select guest_num from GUEST, RES where GUEST.id = RES.id AND rid = $rid"; 
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Guest ID: <select name=\"guest_num\">";
      
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[guest_num]'>$val[guest_num]</option>"; 
	 
      }
      $val = $result->fetch_assoc();
      echo "</select>";
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
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
