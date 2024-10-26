<?php

if (isset($_COOKIE['username'])) {
   $username = $_COOKIE['username'];
   $password = $_COOKIE['password'];
   $server = "vlamp.cs.uleth.ca";
   $db = "stea3660"; 
   $id = $_POST['id'];
   $name = $_POST['name'];
   $dob = $_POST['dob'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];

   $conn = new mysqli($server,$username,$password,$db); 

   /*  Insert into GUEST table given the supplied values from insert_guest2.php  */

   $sql = "INSERT INTO GUEST (id,name,dob,email,phone) VALUES ('$id','$name','$dob','$email', '$phone')"; 
   if($conn->query($sql)) 
   { 
      echo "<h3> Guest $name added!</h3>";
   }
   else {
      $err = $conn->errno; 
      if($err == 1062)
      {
	 echo "<p>Guest id Number $id already exists!</p>"; 
      }
      else {
	 echo "error number $err"; 
      }
      
   }

   echo "<a href=\"main.php\">Return</a> to Home Page."; 
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}

?>
 

