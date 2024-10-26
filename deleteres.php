<?php

if (isset($_COOKIE["username"])) {
      
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "stea3660"; 
   $rid = $_POST['rid'];
   $id = $_POST['id']; 

   $conn = new mysqli($server,$username,$password,$db);

   /* Delete reservation */
   $sql = "delete from RES where rid='$rid'";

try { 
   $conn->query($sql);
   echo "Reservation Deleted!\n";
   
   } catch (Exception $e) {
   echo $e -> getMessage(); 
}

/* Delete guests for deleted reservation */
$sql = "delete from GUEST where id='$id'";

try { 
   $conn->query($sql);
   echo "Guests Deleted!\n";
   
   } catch (Exception $e) {
   echo $e -> getMessage(); 
}

/* Delete rooms for deleted reservation */
$sql = "delete from ROOM where res_id='$rid'";

try { 
   $conn->query($sql);
   echo "Rooms Deleted!\n";
   
   } catch (Exception $e) {
   echo $e -> getMessage(); 
}
  
   echo "<br><br><a href=\"main.php\">Return</a> to Home Page."; 
} else {
   
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
      
}
?>