<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
$did = empty($_POST['did']) ? 'Unknown' : $_POST['did'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT uid FROM user WHERE uname='$username_bbs'";


$sql_delete = "DELETE from ipdays where did=$did";

if ($conn->query($sql_delete) === TRUE) {
    echo '1';
  //  echo $sql;
  //  echo 'a';
  //  echo $checkPassowrd;

} else {
    echo "Error: " . $sql_delete . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
