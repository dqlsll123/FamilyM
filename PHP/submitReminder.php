<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
$content = empty($_POST['content']) ? 'Unknown' : $_POST['content'];
$datetime = empty($_POST['datetime']) ? 'Unknown' : $_POST['datetime'];
$toWhom = empty($_POST['toWhom']) ? 'Unknown' : $_POST['toWhom'];
$fromWhom = empty($_POST['fromWhom']) ? 'Unknown' : $_POST['fromWhom'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT uid FROM user WHERE uname='$username_bbs'";


$sql_insert = "INSERT INTO reminder
VALUES (null, '$content', '$fromWhom', '$toWhom' , '$datetime',now(),1)";

if ($conn->query($sql_insert) === TRUE) {
    echo '1';
  //  echo $sql;
  //  echo 'a';
  //  echo $checkPassowrd;

} else {
    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
