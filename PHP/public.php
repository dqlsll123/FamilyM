<!DOCTYPE html>
<html style="width:100%;height:100%;margin:0px;">
<head>
<title></title>
</head>
<body style="width:100%;height:100%;margin:0px;background-color:#ebebe0">
<div style="background-color:white">

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

   $sql = "SELECT  mdate FROM memory group by mdate desc";
   $result = $conn->query($sql);
   //$sql2 = "SELECT  img , video FROM memory where mdate=";
   if ($result->num_rows > 0) {

     //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
       // output data of each row
     // echo "<ul id='list' data-role='listview'>";
       while($row = $result->fetch_assoc()) {
echo "<div style='background-color:white;margin-top:1px'><div>".$row["mdate"]."</div>";
   $sql2 = "SELECT  img , video FROM memory where isPublic = 1 and mdate='".$row["mdate"]."' ";
   $result2 = $conn->query($sql2);
   if ($result2->num_rows > 0) {

     //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
       // output data of each row
     // echo "<ul id='list' data-role='listview'>";
       while($row2 = $result2->fetch_assoc()) {

            echo "   <img style='width:40px;height:40px;margin-top:2%;margin-left:3%' src='images/".$row2["img"]."' />
       ";
       echo "   <img style='width:40px;height:40px;margin-top:2%;margin-left:3%' src='images/".$row2["video"]."' />
  ";

       }
      //echo $user;
   }
  echo "</div>";
       }
      //echo $user;
   } else {

   }


   $conn->close();
   ?>


</div>

</body>
</html>
