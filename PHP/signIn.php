<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
$username_bbs = empty($_POST['username']) ? 'Unknown' : $_POST['username'];
$password_bbs = empty($_POST['password']) ? 'Unknown' : $_POST['password'];
$checkPassowrd;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT upassword FROM user where uname = '$username_bbs'";
$result = $conn->query($sql);
// echo $result;

if ($result->num_rows > 0) {
  //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $checkPassowrd=$row["upassword"];
        //echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    }}
if ($checkPassowrd==$password_bbs) {
    // output data of each row
  echo '1';

} else {
    echo '2';
}
$conn->close();
?>
