<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
header("Access-Control-Allow-Origin: *");
//$user = empty($_GET['user']) ? 'Unknown' : $_GET['user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  location1lat,location1lng,location2lat,location2lng
,location3lat,location3lng,location4lat,location4lng FROM location";
$result = $conn->query($sql);



if ($result->num_rows > 0) {


    while($row = $result->fetch_assoc()) {

$location = array($row["location1lat"],$row["location1lng"], $row["location2lat"],$row["location2lng"]
,$row["location3lat"],$row["location3lng"],$row["location4lat"],$row["location4lng"]);
$myJSONString = json_encode($location);
echo $myJSONString;
;
    }
   //echo $user;
} else {
    echo "0 results";
}
$conn->close();
?>
