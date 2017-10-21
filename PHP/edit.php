<!DOCTYPE html>
<html style="width:100%;height:100%;margin:0px;">
<head>
<title></title>
</head>
<body style="width:100%;height:100%;margin:0px;">
<div style="background-color:white">
<div>
  <img style="width:40px;height:40px;" src="source/image2.jpg" />
</div>


   <?php
   $servername = "localhost";
   $username = "root";
   $password = "1234";
   $dbname = "capstone";
   header("Access-Control-Allow-Origin: *");
   $user = empty($_GET['user']) ? 'Unknown' : $_GET['user'];
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT  img FROM memory where uname='$user' order by mtime desc";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {

     //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
       // output data of each row
     // echo "<ul id='list' data-role='listview'>";
       while($row = $result->fetch_assoc()) {
           echo "   <img style='width:40px;height:40px;margin-top:2%;margin-left:3%' src='images/".$row["img"]."' />
      ";
       }
      //echo $user;
   } else {
       echo "0 results";
   }
   $conn->close();
   ?>


</div>
<div style="background-color:white;margin-top:1px">

<div>
        <img style="width:40px;height:40px;margin-top:2%;" src="source/video2.jpg" />
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
header("Access-Control-Allow-Origin: *");
$user = empty($_GET['user']) ? 'Unknown' : $_GET['user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  video FROM memory where uname='$user' order by mtime desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
  // echo "<ul id='list' data-role='listview'>";
    while($row = $result->fetch_assoc()) {
        echo "   <img style='width:40px;height:40px;margin-top:2%;margin-left:3%' src='images/".$row["video"]."' />
   ";
    }
   //echo $user;
} else {
    echo "0 results";
}
$conn->close();
?>
</div>

</body>
</html>
