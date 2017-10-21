<html style="width:100%;height:100%;">
<head>

　<meta http-equiv="refresh" content="5;url=cdisplay.php">
</head>
<body style="width:100%;height:100%;margin:0px;background-color:#ebebe0">

<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "capstone";
header("Access-Control-Allow-Origin: *");
//$user = empty($_GET['user']) ? 'Unknown' : $_GET['user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT chtime,nick,words from(SELECT  chtime,nick,words FROM chat order by chtime desc limit 4) as tbl order by chtime";
$result = $conn->query($sql);



if ($result->num_rows > 0) {

  //  echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
  // echo "<ul id='list' data-role='listview'>";
    while($row = $result->fetch_assoc()) {
      echo "<p style='width:100%;text-align:center'>".$row["chtime"]."</p>
      <div  style='width:100%;height:10%;margin-top:1px;font-family: 'PT Sans', Helvetica, Arial, sans-serif;vertical-align:middle'>

         <img style='width:20%;height:100%;float:left' src='source/".$row["nick"].".png' />
         <div style='margin-left:21%'>
                    ".$row["nick"]."

                </div>

                <div style='margin-left:21%'>
                           ".$row["words"]."

                       </div>

            </div>

      ";
      // echo $row["nick"];
      // echo "</br>";
      // echo $row["words"];
      // echo "</br>";
      //
      //   echo "</br>";
      //   echo "</br>";
      //  echo "
    //  <div style='width:100%;height:20%;margin-top:2px;background-color:white'>

      //      <img style='width:20%;height:10%;float:left' src='source/".$row["uname"].".png' />
      //      <div style='float:left'>
      //          ".$row["mcontent"]."
    //


      //       </div>
      //       <br>
      //
      //       <img style='width:60px;height:60px;float:left;margin-left:1%;margin-top:1%' src='images/".$row["img"]."' />
      //       <img style='width:60px;height:60px;float:left;margin-left:1%;margin-top:1%' src='images/".$row["video"]."' />
      //
      //       <br><br><br>
      //       <div style='margin-left:21%'>
      //           ".$row["mtime"]."
      // </div>
      //   </div>";

    }
   //echo $user;
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
