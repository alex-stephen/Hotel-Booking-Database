<?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = 'stea3660';

   /* Variables used for display and logic */
   $motelReservationCapacity = 50;
   $motelName = "Motel Jephen"; 
   $motelLocation = "Lethbridge, Alberta, Canada";
   $motelStreet = "1142 Mayor Magrath Dr S";
   $motelPostalAddress = "T1K 2P8";
   $motelRating = "5-star motel";
   
   try {
      $conn = new mysqli($server,$username,$password, $db);
   } catch (Exception $e) {
   echo $e ->getMessage(); 
   }

   echo "<h1> Motel Jephen </h1>";

   /* Find number of reservations */
   $sql = "select COUNT(*) as reservation_count FROM RES";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
        $row = $result->fetch_assoc();
        $numOfReservations = $row["reservation_count"];    

        echo "Number of reservations: " . $numOfReservations . "<br>";
   }
   else {
      echo "No reservations found"; 
   }

   /* Find number of rooms */
   $sql = "select COUNT(*) as room_count FROM ROOM";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
        $row = $result->fetch_assoc();
        $reservedRooms = $row["room_count"];    

        $remainingRooms = $motelReservationCapacity - $reservedRooms; 

        echo "Rooms reserved: " . $reservedRooms . "<br>";
        echo "Remaining rooms: " . $remainingRooms . " / 50 <br>";
   }
   else {
      echo "No reservations found"; 
   }

    /* Display motel information */
   echo "<br>";
   echo "<b>Motel Name:</b> $motelName <br>";
   echo "<b>Motel Location:</b> $motelLocation <br>";
   echo "<b>Street name:</b> $motelStreet <br>"; 
   echo "<b>Postal Code:</b> $motelPostalAddress <br>";
   echo "<b>Rating:</b> $motelRating <br>"; 
}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}

echo "<br> <a href=\"main.php\">Return</a> to Home Page."; 

?>
