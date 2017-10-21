<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
$content = empty($_POST['content']) ? 'Unknown' : $_POST['content'];
$date = empty($_POST['date']) ? 'Unknown' : $_POST['date'];
$isExpire = empty($_POST['isExpire']) ? 'Unknown' : $_POST['isExpire'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT uid FROM user WHERE uname='$username_bbs'";


$sql_insert = "INSERT INTO ipdays
VALUES (null, 1,'$content', '$date', $isExpire , now())";

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
