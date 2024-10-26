<html>
<!-- Form for inputting reservation information -->
<head><title>Motel Jephen - Add New Reservation</title></head>
<body>
<h2>Add a New Reservation</h2>
<form action="insertres.php" method=post>
    Reservation ID: <input type=text name="rid" size=9><br><br>
    Guest ID: <input type=text name="id" size=9><br><br>
    Number of Rooms: <input type=text name="room" size=5><br><br>
    Number of Guests: <input type=text name="guest" size=5><br><br>
    Check-In: <input type=text name="check_in" size=10><br><br>
    Check-Out: <input type=text name="check_out" size=10><br><br>
    Status: <input type=text name="status" size=10><br><br>
<input type=submit name="submit" value="Insert"></form> 
</body>
</html>