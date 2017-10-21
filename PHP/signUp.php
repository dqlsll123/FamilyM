<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
$username_bbs = empty($_POST['username']) ? 'Unknown' : $_POST['username'];
$password_bbs = empty($_POST['password']) ? 'Unknown' : $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT uid FROM user where uname='$username_bbs'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    if($row = $result1->fetch_assoc()) {
        echo '2';
    }
} else {
  $sql = "INSERT INTO user
  VALUES (null, '$username_bbs', '$password_bbs', now())";

  if ($conn->query($sql) === TRUE) {
      echo '1';
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}




$conn->close();
?>
