<html>
<!-- Form for testing room insertion-->
<head><title>Motel Jephen - Add New Reservation</title></head>
<body>
<h2>Testing room insertion</h2>
<form action="insertroom.php" method=post>
Reservation ID: <input type=text name="res_id" size=10><br><br>
Room number: <input type=text name="room_num" size=10><br><br>
Price: <input type=text name="price" size=10><br><br>
Max guests: <input type=text name="max_num_guest" size=10><br><br>
Room type <input type=text name="room_type" size=10><br><br>
Vacancy (0=false, 1=true) <input type=text name="vacancy" size=10><br><br>
<input type=submit name="submit" value="Insert"></form> 
</body>
</html>