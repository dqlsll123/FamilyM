<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
$user = empty($_POST['user']) ? 'Unknown' : $_POST['user'];
$words = empty($_POST['words']) ? 'Unknown' : $_POST['words'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT uid FROM user WHERE uname='$username_bbs'";


$sql_insert = "INSERT INTO chat
VALUES (now(), '$user' ,'$words')";
if ($conn->query($sql_insert) === TRUE) {
    echo '1';
  //  echo $sql;
  //  echo 'a';
  //  echo $checkPassowrd;

} else {
    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
}
?>
