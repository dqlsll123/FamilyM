<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
header('Access-Control-Allow-Origin: *');
$time = empty($_POST['time']) ? 'Unknown' : $_POST['time'];
$user = empty($_POST['user']) ? 'Unknown' : $_POST['user'];
//$now = time();
$your_date = strtotime("$time");




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT content,rtime,fromWho FROM reminder WHERE toWho='$user'";
$result = $conn->query($sql);

//$sql_delete = "DELETE from ipdays where did=$did";

if ($result->num_rows > 0) {


    while($row = $result->fetch_assoc()) {
    $remind_date = strtotime($row["rtime"]);
     $datediff = $your_date - $remind_date;
    if($datediff>60){
      echo "";
    }else{
      $res = $row["content"]." from ".$row["fromWho"];
      echo $res;

    }
    }
   //echo $user;
} else {
    //echo "0 results";
}
$conn->close();
?>
