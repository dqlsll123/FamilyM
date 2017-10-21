<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";

$user = empty($_POST['user']) ? 'Unknown' : $_POST['user'];
$lat = empty($_POST['lat']) ? 'Unknown' : $_POST['lat'];
$lng = empty($_POST['lng']) ? 'Unknown' : $_POST['lng'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection




//$result = mysql_query($sql);
//$row = mysql_fetch_array($result);
//$uid = $value['uid'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($user=="dad"){
$sql="UPDATE location set location1lat=$lat,location1lng=$lng";

}else if ($user=="mom") {
$sql="UPDATE location set location2lat=$lat,location2lng=$lng";
  # code...
}else if ($user=="sister") {
  $sql="UPDATE location set location3lat=$lat,location3lng=$lng";
  # code...
}else{

$sql="UPDATE location set location4lat=$lat,location4lng=$lng";
}
// sql to delete a record
//$sql="delete from topic where tid='$pid'";

if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "Error record: " . $conn->error;
}

$conn->close();
?>
