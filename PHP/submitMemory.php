<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
$mcontent = empty($_POST['mcontent']) ? 'Unknown' : $_POST['mcontent'];
$uname = empty($_POST['uname']) ? 'Unknown' : $_POST['uname'];
$isPublic = empty($_POST['isPublic']) ? 'Unknown' : $_POST['isPublic'];
$img = empty($_POST['img']) ? 'Unknown' : $_POST['img'];
$video=empty($_POST['video']) ? 'Unknown' : $_POST['video'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT uid FROM user WHERE uname='$username_bbs'";


$sql_insert = "INSERT INTO memory
VALUES (null, 1,'$uname', '$mcontent',  now(),'$isPublic', '$img' ,'$video',curdate())";

if ($conn->query($sql_insert) === TRUE) {
    echo '1';
  //  echo $sql;
  //  echo 'a';
  //  echo $checkPassowrd;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
