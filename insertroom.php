<?php
echo "<form action=\"insertroom2.php\" method=post>";
if (isset($_COOKIE['username']))  
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$server = "vlamp.cs.uleth.ca";
$db = "stea3660";
$rid = $_POST['res_id'];
$room = $_POST['rooms'];
$price_reg = "100";
$price_deluxe = "120";
$vacancy = "Reserved";
$room_deluxe = "Deluxe";
$room_reg = "Regular";
$options = array("Deluxe", "Regular");

/* Give user option to select either Deluxe or Regular room */
try
{
$conn = new mysqli($server,$username,$password, $db);
} catch (Exception $e) {
	echo $e -> getMessage();   
}
    
    echo "Room Type: <select name=\"dropdown\">";
    foreach ($options as $option) {
        echo "<option value='" . htmlspecialchars($option) . "'>" . htmlspecialchars($option) . "</option>";
    }
    
    echo "</select>"; 
	echo "<input type=hidden name=\"rid\" value=\"$rid\">";
    echo "<input type=hidden name=\"room\" value=\"$room\">";
	echo "<input type=hidden name=\"price_del\" value=\"$price_deluxe\">";
	echo "<input type=hidden name=\"price_reg\" value=\"$price_reg\">";
	echo "<input type=hidden name=\"vacancy\" value=\"$vacancy\">";

    echo "<input type=submit name=\"submit\" value=\"Choose\">"; 

	echo "</form>";
?>

