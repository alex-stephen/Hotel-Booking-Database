<?php

if (isset($_COOKIE["username"])) {
      
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "stea3660"; 
   $rid = $_POST['rid'];
   $id = $_POST['guest_num']; 

   $conn = new mysqli($server,$username,$password,$db);

/* Guest ID is passed from previous page, this query deletes guest ID from GUEST table */
$sql = "delete from GUEST where guest_num='$id'";

/* Error handling for query */ 
try { 
   $conn->query($sql);
   echo "Guests Deleted!\n";
   
   } catch (Exception $e) {
   echo $e -> getMessage(); 
}
 
   echo "<br><br><a href=\"main.php\">Return</a> to Home Page."; 
} else {
   
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
      
}
?>