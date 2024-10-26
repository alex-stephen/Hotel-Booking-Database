<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<!-- Styling -->
<style>
    body {
        background-color: white;
    }
    .column {
        display: inline-block;
        width: 15%;
        vertical-align: top;
    }
    .link{
        display: block;
        font-size: 20px;
    }
    .logout{
        display: inline-block;
        width: 15%;
        vertical-align: top;
        padding-top: 200px;
    }
    .image{
        position: relative;
        width: 1500px;
        height: 500px;
    }
    .overlay{
        position: absolute;
        top: 50%;
        left: 75%; 
        transform: translate(-50%, -50%);
        text-align: right;
        color: white;
        font-size: 30px;
    }
</style>

<!-- Background image -->
<div class="image">
    <img src="backgroundImage2.webp" alt="mountain" width="1500" height="500"> 
    <div class="overlay">
        <h1> Motel Jephen </h1>
    </div>
</div>    

<p style="font-size: 20px;"><b>Welcome, select from one of the following operations:</b></p>

<!-- Columns of available user operations -->
<div class="column">
    <div class="link">
        <a href="select_res.php">
        <span class="material-symbols-outlined">search</span>
        Select a Reservation
        </a>

    <p><a href="logout.php" class="logout">
        <span class="material-symbols-outlined">logout</span>
        Logout
        </a></p>
    </div>
</div>

<div class="column">
    <div class="link">
        <a href="insert_res.php">
        <span class="material-symbols-outlined">variable_insert</span>
        Insert a Reservation
        </a>
    </div>
    <div class="link">
        <a href="insert_guest.php">
        <span class="material-symbols-outlined">variable_insert</span>
        Insert a Guest
        </a>
    </div>
</div>

<div class="column">
    <div class="link">
        <a href="update_res.php">
        <span class="material-symbols-outlined">update</span>
        Update a Reservation
        </a>
    </div>
    <div class="link">
        <a href="update_guest.php">
        <span class="material-symbols-outlined">update</span>
        Update a Guest
        </a>
    </div>
</div>

<div class="column">
    <div class="link">
        <a href="delete_res.php">
        <span class="material-symbols-outlined">delete</span>
        Delete a Reservation
        </a>
    </div>
    <div class="link">
        <a href="delete_guest.php">
        <span class="material-symbols-outlined">delete</span>
        Delete a Guest
    </a>
    </div>
</div>
<div class="column">
    <div class="link">
        <a href="make_payment.php">
        <span class="material-symbols-outlined">payments</span>
        Make Payment
    </a>
<br>
    </div>
    <div class="link">
        <a href="displaymotel.php">
        <span class="material-symbols-outlined">visibility</span>
        Display Motel Information
        </a>
    </div>
</div>
</html>